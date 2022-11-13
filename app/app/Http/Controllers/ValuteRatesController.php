<?php

namespace App\Http\Controllers;

use App\Services\BankRates\CentralBank;

class ValuteRatesController extends Controller
{
    /**
     * Showing the template and data
     */
    public function index(CentralBank $cb)
    {
        return view('index', [
            'rates' => $cb->get(),
            'last_update' => $cb->lastUpdate()
        ]);
    }
}
