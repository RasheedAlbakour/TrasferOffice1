<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CurrencyController extends Controller
{
    public function index(Request $request)
    {
        // قم بجلب البيانات من الموقع وتخزينها في الذاكرة المؤقتة لمدة 5 دقائق
        $exchangeRates = Cache::remember('exchange_rates', 300, function () {
            $response = Http::get('https://v6.exchangerate-api.com/v6/94d2da0236ed9f5f5dbef898/latest/USD');
            return $response->json()['conversion_rates'];
        });

        // إضافة خاصية البحث
        $searchSymbol = $request->input('search_symbol');
        if ($searchSymbol) {
            $exchangeRates = collect($exchangeRates)->filter(function ($exchangeRate, $currencyCode) use ($searchSymbol) {
                // البحث بواسطة رمز العملة
                return str_contains($currencyCode, $searchSymbol);
            })->toArray();
        }

        return view('currencies.index', compact('exchangeRates'));
    }

    public function create()
    {
        return view('currencies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:currencies',
            'exchange_rate' => 'required|numeric|min:0.01',
        ]);

        Currency::create($request->all());

        return redirect()->route('currencies.index')->with('success', 'تمت إضافة العملة بنجاح.');
    }
}
