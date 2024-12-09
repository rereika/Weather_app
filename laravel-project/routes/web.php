<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Weather_app.home');
});
