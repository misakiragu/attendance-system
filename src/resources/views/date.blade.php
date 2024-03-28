@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/date.css') }}">
@endsection

@section('content')

<div class="date-day">
    <a href="{{ route('date.show', ['date' => $previousDate]) }}" class="arrow-left">&lt;</a>
    <p class="date-today">{{ $date }}</p>
    <a href="{{ route('date.show', ['date' => $nextDate]) }}" class="arrow-right">&gt;</a>
</div>


<div class="date-content">
    <table class="date-table">
        <tr>
            <th>名前</th>
            <th>勤務開始</th>
            <th>勤務終了</th>
            <th>休憩時間</th>
            <th>勤務時間</th>
        </tr>
        @foreach ($results as $result)
        @if ($result->date == $date)
        <tr>
            <td class="date-table__item">
                {{ $result->name }}
            </td>
            <td class="date-table__item">
                {{ $result->start_time }}
            </td>
            <td class="date-table__item">
                {{ $result->end_time }}
            </td>
            <td class="date-table__item">
                {{ $result->total_break_time }}
            </td>
            <td class="date-table__item">
                {{ $result->total_work_time }}
            </td>
        </tr>
        @endif
        @endforeach
    </table>
    <div class="pagination">
        {{ $attendances->links() }}
    </div>
</div>
@endsection