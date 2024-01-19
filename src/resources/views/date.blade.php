@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="attendance__content">
    <p>{{ $date ?? '未設定' }}</p>
    <p>名前: {{ $userName ?? 'Guest' }}</p>
    <p>勤務開始: {{ $startTime ?? '未設定' }}</p>
    <p>勤務終了: {{ $endTime ?? '未設定' }}</p>
    <p>休憩時間: </p>
    <p>勤務時間: </p>
</div>
@endsection