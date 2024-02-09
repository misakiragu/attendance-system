@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="attendance__content">
    <table class="date-table__inner">
        @foreach ($results as $result)
        <tr class="date-table__row">
            <td class="date-table__item">
                {{ $result->name }}
            </td>
        </tr>
        @endforeach
        @foreach ($attendances as $attendance)
        <tr class="date-table__row">
            <td class="date-table__item">
                {{ $startTime }}
            </td>
            <td class="date-table__item">
                {{ $endTime }}
            </td>
            <td class="date-table__item">
                {{ $duration->format('%H:%I:%S') }}
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection