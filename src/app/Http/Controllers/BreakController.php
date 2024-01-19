<?php

namespace App\Http\Controllers;

use App\Models\attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BreakController extends Controller
{
    public function index()
    {
        return view('attendance');
    }

    public function breakStart()
    {
        DB::table('attendances')->insert([
            'user_id' => '名前',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return view('attendance')->with('message', '休憩が開始しました');
    }

    public function breakEnd()
    {
        DB::table('attendances')->insert([
            'user_id' => '名前',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return view('attendance')->with('message', '休憩が終了しました');
    }

}
