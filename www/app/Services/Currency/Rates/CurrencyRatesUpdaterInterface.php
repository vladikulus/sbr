<?php

declare(strict_types=1);

namespace App\Services\Currency\Rates;

interface CurrencyRatesUpdaterInterface
{
    public function update();
}
