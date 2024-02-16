<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DateController extends Controller
{

    public function calculateDuration($start, $end)
    {
        $startTime = Carbon::parse($start);
        $endTime = Carbon::parse($end);

        return $startTime->diff($endTime);
    }

    public function calculateBreakTime($start, $end, $breakStart, $breakEnd)
    {
        $startTime = Carbon::parse($start);
        $endTime = Carbon::parse($end);
        $breakStartTime = Carbon::parse($breakStart);
        $breakEndTime = Carbon::parse($breakEnd);

        // 休憩時間を取り除く
        $workDuration = $startTime->diff($endTime);
        $breakDuration = $breakStartTime->diff($breakEndTime);
        // 休憩時間を取り除く
        $netWorkDuration = $startTime->copy()->add($workDuration)->sub($breakDuration);

        return $netWorkDuration;
    }

    public function getWorkData()
    {
        // 現在の日付を取得
        $today = Carbon::now()->toDateString();

        $date = now()->toDateString();

        // 指定された日付のデータのみを取得
        $attendances = Attendance::with('user')->whereDate('date', $date)->get();

        // テーブルの結合
        $results = DB::table('attendances')
        ->join('users', 'attendances.user_id', '=', 'users.id')
        ->join('breaks', 'breaks.attendance_id', '=', 'attendances.id')
        // 返すカラムを指定（テーブル名.カラム名）
        ->select(
            'users.name',
            'attendances.start_time',
            'attendances.end_time',
            // 集計（asは別名で定義）
            DB::raw('SUM(TIMESTAMPDIFF(SECOND, breaks.break_start_time, breaks.break_end_time)) as total_break_time')
        )
        ->groupBy('users.name', 'attendances.start_time', 'attendances.end_time')
        ->get();

        return view('date')
            ->with('results', $results);
    }
}

