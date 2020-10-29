<?php

namespace App\Http\Controllers;

use App\Models\CurrencyRate;
use App\Services\Currency\GetList\CurrencyGetListServiceProviderInterface;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * @var CurrencyGetListServiceProviderInterface
     */
    private $getListServiceProvider;

    public function __construct(
        CurrencyGetListServiceProviderInterface $getListServiceProvider
    ) {
        $this->getListServiceProvider = $getListServiceProvider;
    }

    public function list(Request $request)
    {
        return $this->getListServiceProvider->getList($request);
    }

    public function show(CurrencyRate $rate)
    {
        return $rate->toJson();
    }
}
