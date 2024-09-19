<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ExchangeRateController extends Controller
{
    public function showExchangeRates()
    {
        $client = new Client();
        $response = $client->get('https://v6.exchangerate-api.com/v6/94d2da0236ed9f5f5dbef898/latest/USD');
        $data = json_decode($response->getBody(), true);

        $exchangeRates = [
            'ليرة سورية' => $data['conversion_rates']['SYP'],
            'ليرة تركية' => $data['conversion_rates']['TRY'],
            'اليورو' => $data['conversion_rates']['EUR'],
            'الريال السعودي' => $data['conversion_rates']['SAR'],
        ];

        return view('exchange-rates', compact('exchangeRates'));
    }
}
