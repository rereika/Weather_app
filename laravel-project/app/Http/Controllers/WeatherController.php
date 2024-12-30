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

    public function currentLocationWeather(Request $request)
    {
        $latitude = $request->query('latitude');
        $longitude = $request->query('longitude');

        $weatherData = $this->openWeather->getWeatherByCoordinates($latitude, $longitude);

        return response()->json($weatherData);
    }

    public function searchCityWeather(Request $request)
    {
        $city = $request->query('city');
        $weatherData = $this->openWeather->getWeatherByCity($city);

        return response()->json($weatherData);
    }




}
