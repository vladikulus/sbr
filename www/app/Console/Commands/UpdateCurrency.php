<?php

namespace App\Console\Commands;

use App\Services\Currency\Rates\CurrencyRatesUpdaterInterface;
use App\Services\Currency\Updater\CurrencyUpdaterInterface;
use Illuminate\Console\Command;

class UpdateCurrency extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param CurrencyUpdaterInterface $currencyUpdater
     * @param CurrencyRatesUpdaterInterface $currencyRatesUpdater
     */
    public function handle(
        CurrencyUpdaterInterface $currencyUpdater,
        CurrencyRatesUpdaterInterface $currencyRatesUpdater
    ) {
        $currencyUpdater->update();
        $currencyRatesUpdater->update();
    }
}
