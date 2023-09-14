<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function getWeather($location)
    {
        // Replace 'YOUR_API_KEY' with your OpenWeatherMap API key
        $apiKey = '0512443e6471b26afd47ca4dd239d5fb';

        // Make a GET request to the OpenWeatherMap API
        $response = Http::get("https://api.openweathermap.org/data/2.5/weather?q={$location}&appid={$apiKey}");

        // Check if the request was successful
        if ($response->successful()) {
            $data = $response->json();
            
            // Extract relevant weather data from the response (e.g., temperature, weather conditions)
            $temperature = $data['main']['temp'];
            $conditions = $data['weather'][0]['description'];

            return response()->json(['temperature' => $temperature, 'conditions' => $conditions], 200);
        } else {
            // Handle the case when the request fails
            return response()->json(['message' => 'Unable to fetch weather data'], 500);
        }
    }
}
