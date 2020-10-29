<?php

declare(strict_types=1);

namespace App\Services\Currency\Updater;


use App\Models\Repositories\Currency\CurrencyRepositoryInterface;

class CurrencyUpdater implements CurrencyUpdaterInterface
{
    /**
     * @var CurrencyProviderInterface
     */
    private $currencyProvider;

    /**
     * @var CurrencyRepositoryInterface
     */
    private $currencyRepository;

    public function __construct(
        CurrencyProviderInterface $currencyProvider,
        CurrencyRepositoryInterface $currencyRepository
    ) {
        $this->currencyProvider = $currencyProvider;
        $this->currencyRepository = $currencyRepository;
    }

    public function update(): void
    {
        $this->currencyRepository->fillCurrencies($this->currencyProvider->getData());
    }
}
