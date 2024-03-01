<?php

namespace App\Http\Controllers;

use App\Models\attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BreakController extends Controller
{
    public function index()
    {
        return view('attendance');
    }

    public function breakStart(Request $request)
    {
        $userId = Auth::id();
        $date = now()->toDateString();
        $attendance = DB::table('attendances')->where([
            'user_id' => $userId,
            'date' => $date
        ])->first();

        $startTime = now()->toTimeString();

        DB::table('breaks')->insert([
            'attendance_id' => $attendance->id,
            'break_start_time' => $startTime,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $userName = Auth::user()->name;
        $message = '休憩が開始されました';

        return view('attendance', compact('userName', 'message'));
    }

    public function breakEnd(Request $request)
    {
        $userId = Auth::id();
        $date = now()->toDateString();
        $attendance = DB::table('attendances')->where([
            'user_id' => $userId,
            'date' => $date
        ])->first();

        $endTime = now()->toTimeString();

        DB::table('breaks')->where(['attendance_id'=> $attendance->id, 'break_end_time'=>null])
        ->update([
            'break_end_time' => $endTime,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $userName = Auth::user()->name;
        $message = '休憩が終了しました';

        return view('attendance', compact('userName', 'message'));
    }

}
