@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="attendance__content">
    <table class="date-table__inner">
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
        </tr>
        @endforeach
    </table>
</div>
@endsection