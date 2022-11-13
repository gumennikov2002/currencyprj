<?php

namespace App\Http\Controllers;

use App\Contracts\CurrencyConverterContract;

class ValuteRatesController extends Controller
{
    /**
     * Showing the template and data
     */
    public function index(CurrencyConverterContract $currencyConverter)
    {
        return view('index', [
            'rates'       => $currencyConverter->get(),
            'last_update' => $currencyConverter->lastUpdate()
        ]);
    }
}
