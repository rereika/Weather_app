<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OpenWeather
{
    // 緯度・経度で天気情報を取得するメソッド
    public function getWeatherByCoordinates($latitude, $longitude){

        $apiKey = env('OPENWEATHER_API_KEY');

        $url = "https://api.openweathermap.org/data/2.5/weather";

        $response = Http::get($url, [
            'lat' => $latitude,
            'lon' => $longitude,
            'appid' => $apiKey,
            'units' => 'metric',
            'lang' => 'ja',
        ]);

        // レスポンスが正常であれば JSON を返す
        if ($response->successful()) {
            return $response->json();
        } else {
            return ['error' => '天気情報の取得に失敗しました。'];
        }
    }


    // 都市名で天気情報を取得するメソッド
    public function getWeatherByCity($city)
    {
        $apiKey = env('OPENWEATHER_API_KEY');

        $url = "https://api.openweathermap.org/data/2.5/weather";

        // API へリクエストを送信
        $response = Http::get($url, [
            'q' => $city,          // 都市名
            'appid' => $apiKey,    // API キー
            'units' => 'metric',   // 摂氏温度で表示
            'lang' => 'ja',        // 日本語で結果を取得
        ]);

        // レスポンスが正常であれば JSON を返す
        if ($response->successful()) {
            return $response->json();
        } else {
            return ['error' => '天気情報の取得に失敗しました。'];
        }
    }
}
