<?php

namespace App\Services\BankRates;

use App\Helpers\Json;
use Illuminate\Support\Facades\Log;
use App\Contracts\BankRates\CurrencyConverter;
use App\Models\ValuteRate;

/**
 * The class involves working with an external 
 * service to reflect exchange rates
 */
class CentralBank implements CurrencyConverter
{
    private string $remoteUri;

    public function __construct()
    {
        $this->remoteUri = env('CENTRAL_BANK_URI');
    }

    /**
     * Get rates from database
     */
    public function get()
    {
        return ValuteRate::all();
    }

    /**
     * Load rates from remote to database
     */
    public function load()
    {
        try {
            $rates = $this->getRemote();

            foreach ($rates['Valute'] as $valuteCode => $info) {
                $date = date('Y-m-d H:i:s', strtotime($rates['Date']));
                $previousDate = date('Y-m-d H:i:s', strtotime($rates['PreviousDate']));

                ValuteRate::updateOrCreate([
                    'id'             => $info['ID'],
                    'num_code'       => $info['NumCode'],
                    'char_code'      => $info['CharCode'],
                    'nominal'        => $info['Nominal'],
                    'name'           => $info['Name'],
                    'value'          => $info['Value'],
                    'previous_value' => $info['Previous'],
                    'date'           => $date,
                    'previous_date'  => $previousDate
                ]);
            }
            return true;

        } catch(\Exception $e) {
            Log::error($e->getMessage());
            return $e->getMessage();
        }
    }

    /**
     * Get rates from remote json file
     * 
     * @return array
     */
    public function getRemote(): array
    {
        return Json::read($this->remoteUri);
    }

    /**
     * Get last date
     * 
     * If no record found it gives today's date by default
     * 
     * @return string
     */
    public function lastUpdate(): string
    {
        return ValuteRate::first()->date ?? now();
    }
}