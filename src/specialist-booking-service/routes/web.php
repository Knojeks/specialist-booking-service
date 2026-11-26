<?php

use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorScheduleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/doctors', [DoctorController::class, 'index'])
    ->name('doctors.index');

Route::get('/doctors/{doctor}/schedule', [DoctorScheduleController::class, 'show'])
    ->name('doctors.schedule');
