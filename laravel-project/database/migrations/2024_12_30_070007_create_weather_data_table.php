<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('weatherData', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('location_id');
            $table->timestamp('fetched_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('current_weather', 50);
            $table->decimal('temperature', 5, 2);
            $table->decimal('max_temperature', 5, 2);
            $table->decimal('min_temperature', 5, 2);
            $table->decimal('humidity', 5, 2);
            $table->timestamp('sunrise_time');
            $table->timestamp('sunset_time');

            // 外部キー設定
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weatherData');
    }
};
