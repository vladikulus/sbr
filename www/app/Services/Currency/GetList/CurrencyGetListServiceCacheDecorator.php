<?php

declare(strict_types=1);

namespace App\Services\Currency\GetList;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CurrencyGetListServiceCacheDecorator implements CurrencyGetListServiceProviderInterface
{
    private const CACHE_KEY = 'currency:list';

    /**
     * @var CurrencyGetListServiceProviderInterface
     */
    private $inner;

    /**
     * @var int
     */
    private $ttl;

    public function __construct(CurrencyGetListServiceProviderInterface $inner, int $ttl)
    {
        $this->inner = $inner;
        $this->ttl = $ttl;
    }

    public function getList(Request $request)
    {
        $cacheKey = $this->getCacheKey($request->fullUrl());
        if (!Redis::exists($cacheKey)) {
            Redis::setex($cacheKey, $this->ttl, $this->inner->getlist($request));
        }

        return Redis::get($cacheKey);
    }

    private function getCacheKey(string $path): string
    {
        return sprintf("%s:%s", self::CACHE_KEY, $path);
    }
}
