<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BreakController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AttendanceController::class, 'create']);

Route::middleware('auth')->group(function () {
    Route::get('/', [AuthController::class, 'index']);
});
Route::get('/attendance/create', [AttendanceController::class, 'create']);

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        $user = Auth::user();

        return view('/attendance', ['userName' => $user->name]);
    });
});

Route::post('/attendance/start', [AttendanceController::class, 'attendanceStart']);

Route::post('/attendance/end', [AttendanceController::class, 'attendanceEnd']);

Route::post('/break/start', [BreakController::class, 'breakStart']);

Route::post('/break/end', [BreakController::class, 'breakEnd']);