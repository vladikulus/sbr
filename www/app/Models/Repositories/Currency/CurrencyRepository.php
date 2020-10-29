<?php

declare(strict_types=1);

namespace App\Models\Repositories\Currency;

use App\Models\Currency;
use App\Models\CurrencyRate;
use App\Services\Currency\ExternalProvider\Dto\CurrencyListDto;
use App\Services\Currency\ExternalProvider\Dto\CurrencyRateListDto;
use Illuminate\Support\Facades\Date;

class CurrencyRepository implements CurrencyRepositoryInterface
{
    public function fillCurrencies(CurrencyListDto $currencyListDto): void
    {
        foreach($currencyListDto->getCurrencies() as $currency) {
            Currency::updateOrCreate([
                'name' => $currency->getName(),
                'iso_char_code' => $currency->getCode(),
                'eng_name' => $currency->getEngName(),
                'nominal' => $currency->getNominal(),
            ]);
        }
    }

    public function fillCurrenciesRates(CurrencyRateListDto $currencyRateListDto): void
    {
        foreach($currencyRateListDto->getRates() as $rate) {
            CurrencyRate::firstOrCreate([
                'iso_char_code' => $rate->getCode(),
                'value' => $rate->getValue(),
                'created_at' => date('Y-m-d'),
            ]);
        }
    }
}
