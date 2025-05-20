<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class WeatherController extends Controller
{
    public function index(Request $request)
    {
        $weather = null;
        $forecast = null;
        $error = null;

        if ($request->isMethod('post')) {
            $city = $request->input('city');
            $apiKey = env('OPENWEATHERMAP_API_KEY');

            $current = Http::get("https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric&lang=id")->json();

            $forecastData = Http::get("https://api.openweathermap.org/data/2.5/forecast?q={$city}&appid={$apiKey}&units=metric&lang=id")->json();

            if (isset($current['cod']) && $current['cod'] == 200 && isset($forecastData['cod']) && $forecastData['cod'] == "200") {
                $weather = $current;
                
                // Filter forecast data untuk hanya menampilkan waktu yang akan datang
                $now = now();
                $forecast = collect($forecastData['list'])->filter(function($item) use ($now) {
                    return Carbon::parse($item['dt_txt'])->isAfter($now);
                })->values()->all();
                
                // Simpan riwayat pencarian jika user login
                if (auth()->check()) {
                    \App\Models\SearchHistory::create([
                        'user_id' => auth()->id(),
                        'city' => $city,
                        'weather' => json_encode($current),
                        'searched_at' => now(),
                    ]);
                }
            } else {
                $error = 'City not found';
            }
        }

        return view('weather.index', [
            'weather' => $weather,
            'forecast' => $forecast,
            'error' => $error,
        ]);
    }
}
