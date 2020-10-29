<?php

namespace App\Providers;

use App\Models\Repositories\Currency\CurrencyRepository;
use App\Models\Repositories\Currency\CurrencyRepositoryInterface;
use App\Services\Currency\ExternalProvider\Dto\CurrencyListDto;
use App\Services\Currency\ExternalProvider\Dto\CurrencyRateListDto;
use App\Services\Currency\ExternalProvider\Providers\SBRProvider;
use App\Services\Currency\GetList\CurrencyGetListService;
use App\Services\Currency\GetList\CurrencyGetListServiceCacheDecorator;
use App\Services\Currency\GetList\CurrencyGetListServiceProviderInterface;
use App\Services\Currency\Rates\CurrencyRatesProviderInterface;
use App\Services\Currency\Rates\CurrencyRatesUpdater;
use App\Services\Currency\Rates\CurrencyRatesUpdaterInterface;
use App\Services\Currency\Updater\CurrencyProviderInterface;
use App\Services\Currency\Updater\CurrencyUpdaterInterface;
use Illuminate\Support\ServiceProvider;
use App\Services\Currency\Updater\CurrencyUpdater;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            CurrencyUpdaterInterface::class,
            CurrencyUpdater::class);

        $this->app->bind(
            CurrencyRatesUpdaterInterface::class,
            CurrencyRatesUpdater::class);

        $this->app->bind(CurrencyProviderInterface::class, function () {
            return new SBRProvider(
                config('providers.sbr.domain_currencies'),
                $this->app->make(SerializerInterface::class),
                CurrencyListDto::class
            );
        });

        $this->app->bind(CurrencyRatesProviderInterface::class, function () {
            return new SBRProvider(
                config('providers.sbr.domain_currencies_rates'),
                $this->app->make(SerializerInterface::class),
                CurrencyRateListDto::class
            );
        });

        $this->app->bind(CurrencyGetListServiceProviderInterface::class, CurrencyGetListService::class);

        $this->app->extend(CurrencyGetListServiceProviderInterface::class, function ($provider) {
            return new CurrencyGetListServiceCacheDecorator(
                $provider,
                config('providers.sbr.cache_ttl')
            );
        });

        $this->app->bind(SerializerInterface::class, function () {
            return SerializerBuilder::create()->build();
        });

        $this->app->bind(CurrencyRepositoryInterface::class, CurrencyRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
