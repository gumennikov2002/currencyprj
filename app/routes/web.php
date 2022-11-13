<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ValuteRatesController;

Route::get('/', [ValuteRatesController::class, 'index']);
