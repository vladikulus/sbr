<?php

declare(strict_types=1);

namespace App\Models\Repositories\Currency;

use App\Services\Currency\ExternalProvider\Dto\CurrencyListDto;
use App\Services\Currency\ExternalProvider\Dto\CurrencyRateListDto;

interface CurrencyRepositoryInterface
{
    public function fillCurrencies(CurrencyListDto $currencyListDto): void;
    public function fillCurrenciesRates(CurrencyRateListDto $currencyRateListDto): void;
}
