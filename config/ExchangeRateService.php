<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ExchangeRateService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = config('services.exchange_rate.api_key');
    }

    public function getExchangeRate($baseCurrency = 'USD')
    {
        $response = Http::get("https://v6.exchangerate-api.com/v6/{$this->apiKey}/latest/{$baseCurrency}");

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }
}
