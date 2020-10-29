<?php

declare(strict_types=1);

namespace App\Services\Currency\ExternalProvider\Providers;


interface ExternalProviderInterface
{
    public function getData();
}
