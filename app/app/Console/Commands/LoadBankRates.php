<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\BankRates\CentralBank;

class LoadBankRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rates:load';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Load currency rates to local database';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(CentralBank $cb)
    {
        $cb->load();
    }
}
