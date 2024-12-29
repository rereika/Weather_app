<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('Weather_app.home');
});

Route::get('/weather', [WeatherController::class, 'nameCheckWether'])->name('name.check.weather');

Route::get('/home', [HomeController::class, 'backHome'])->name('back.home');

// 緯度・経度を受け取って天気情報を返す
Route::get('/weather/current-location', [WeatherController::class, 'currentLocationWeather']);

// 地名を受け取って天気情報を返す
Route::get('/weather/search-city', [WeatherController::class, 'searchCityWeather']);
