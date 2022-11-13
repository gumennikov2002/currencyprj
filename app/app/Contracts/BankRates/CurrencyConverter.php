<?php

namespace App\Contracts\BankRates;

/**
 * The interface provides instructions
 * for using and using data from external services
 * reflectiong exchange rates
 */
interface CurrencyConverter
{
    /**
     * Method should get data stored in database
     */
    public function get();

    /**
     * Method should load remote data 
     * and save it to database
     */
    public function load();

    /**
     * Method should get data directly from
     * the service
     * 
     * @return array
     */
    public function getRemote(): array;

    /**
     * Method should get datetime of the last
     * save
     * 
     * @return string
     */
    public function lastUpdate(): string;
}