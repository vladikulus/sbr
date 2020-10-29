<?php

declare(strict_types=1);

namespace App\Services\Currency\Rates;

use App\Models\Repositories\Currency\CurrencyRepositoryInterface;

class CurrencyRatesUpdater implements CurrencyRatesUpdaterInterface
{
    /**
     * @var CurrencyRatesProviderInterface
     */
    private $currencyRatesProvider;

    /**
     * @var CurrencyRepositoryInterface
     */
    private $currencyRepository;

    public function __construct(
        CurrencyRatesProviderInterface $currencyRatesProvider,
        CurrencyRepositoryInterface $currencyRepository
    ) {
        $this->currencyRatesProvider = $currencyRatesProvider;
        $this->currencyRepository = $currencyRepository;
    }

    public function update(): void
    {
        $this->currencyRepository->fillCurrenciesRates($this->currencyRatesProvider->getData());
    }
}
