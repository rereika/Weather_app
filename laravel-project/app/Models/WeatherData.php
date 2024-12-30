<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherData extends Model
{
    use HasFactory;

    protected $table = 'weather_data';


    protected $fillable = [
        'location_id',
        'fetched_at',
        'current_weather',
        'temperature',
        'max_temperature',
        'min_temperature',
        'humidity',
        'sunrise_time',
        'sunset_time',
    ];

    public $timestamps = true;
}
