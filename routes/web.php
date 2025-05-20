<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;

Route::match(['get', 'post'], '/', [WeatherController::class, 'index'])->name('weather.index');

require __DIR__.'/auth.php';
