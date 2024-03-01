@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/date.css') }}">
@endsection

@section('content')

<div class="date-content">
    <p>{{ $today }}</p>
    <table class="date-table">
        <tr>
            <th>名前</th>
            <th>勤務開始</th>
            <th>勤務終了</th>
            <th>休憩時間</th>
            <th>勤務時間</th>
        </tr>
        @foreach ($results as $results)
        <tr>
            <td class="date-table__item">
                {{ $results->name }}
            </td>
            <td class="date-table__item">
                {{ $results->start_time }}
            </td>
            <td class="date-table__item">
                {{ $results->end_time }}
            </td>
            <td class="date-table__item">
                {{ $results->total_break_time }}
            </td>
            <td class="date-table__item">
                {{ $results->total_work_time }}
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection