<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;

Route::get('/', function () {
    return view('Weather_app.home');
});

Route::get('/weather', [WeatherController::class, 'nameCheckWether'])->name('name.check.weather');
