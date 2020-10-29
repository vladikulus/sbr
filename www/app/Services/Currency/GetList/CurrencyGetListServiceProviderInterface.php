<?php

declare(strict_types=1);

namespace App\Services\Currency\GetList;

use Illuminate\Http\Request;

interface CurrencyGetListServiceProviderInterface
{
    public function getList(Request $request);
}
