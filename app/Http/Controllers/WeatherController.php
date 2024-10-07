<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function index(Request $request){
        $city = $request->input('city', 'Mandaluyong City');

        $apiKey = env('WEATHER_API_KEY');
        $client = new Client();

        try {
            $response = $client->get("http://api.weatherapi.com/v1/current.json?key={$apiKey}&q={$city}&aqi=no");
            $weatherData = json_decode($response->getBody()->getContents());

            return view('weather', ['weather' => $weatherData]);

        } catch (\Exception $e) {
            return view('weather', ['error' => 'City not found or API error.']);
        }
    }
}
