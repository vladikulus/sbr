<?php

declare(strict_types=1);

namespace App\Services\Currency\GetList;

use App\Models\CurrencyRate;
use Illuminate\Http\Request;

class CurrencyGetListService implements CurrencyGetListServiceProviderInterface
{
    public function getList(Request $request)
    {
        return CurrencyRate::filters()
            ->defaultSort('id')
            ->paginate()
            ->appends($request->input())
            ->toJson(JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE)
        ;
    }
}
