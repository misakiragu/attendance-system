<?php

namespace App\Http\Controllers;

use App\Models\attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function create()
    {
        return view('attendance');
    }

    public function attendanceStart(Request $request)
    {
        $userId = Auth::id();
        $date = now()->toDateString();
        $startTime = now()->toTimeString();
        
        DB::table('attendances')->insert([
            'user_id' => $userId,
            'date' => $date,
            'start_time' => $startTime,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $userName = Auth::user()->name;

        return view('attendance', compact('userName'))->with('message', '出勤が登録されました');
    }

    public function attendanceEnd()
    {
        $userId = Auth::id();
        $date = now()->toDateString();
        $endTime = now()->toTimeString();
        
        DB::table('attendances')
        ->where('user_id', $userId)
            ->where('date', $date)
            ->update(['end_time' => $endTime, 'updated_at' => now()]);

        $userName = Auth::user()->name;

        return view('attendance', compact('userName'))->with('message', '退勤が登録されました');
    }
}


