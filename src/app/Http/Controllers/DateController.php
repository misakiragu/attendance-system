<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\attendance;
use Carbon\Carbon;

class DateController extends Controller
{
    public function calculateDuration($start, $end)
    {
        $startTime = Carbon::parse($start);
        $endTime = Carbon::parse($end);

        $duration = $startTime->diff($endTime);

        return $duration;
    }
    
    public function getWorkData()
    {
        $results = User::all();
        $attendances = Attendance::all();

        $startTime = $attendances->first()->start_time;
        $endTime = $attendances->first()->end_time;

        $duration = $this->calculateDuration($startTime, $endTime);

        return view('date')
            ->with('results', $results)
            ->with('attendances', $attendances)
            ->with('startTime', $startTime)
            ->with('endTime', $endTime)
            ->with('duration', $duration);
    }
}
