<?php

declare(strict_types=1);

namespace App\Services\Currency\Updater;

interface CurrencyUpdaterInterface
{
    public function update(): void;
}
