<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Services\OpenWeather;

class WeatherController extends Controller
{
    protected $openWeather;

    public function __construct(OpenWeather $openWeather)
    {
        $this->openWeather = $openWeather;
    }

    public function nameCheckWether(Request $request){

        $city = $request->query('city');

        $weatherData = $this->openWeather->getWeatherByCity($city);

        return view('Weather_app.home', compact('weatherData'));
    }


}
