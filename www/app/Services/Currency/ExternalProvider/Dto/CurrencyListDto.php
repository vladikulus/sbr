<?php

declare(strict_types=1);

namespace App\Services\Currency\ExternalProvider\Dto;


use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("Valuta")
 */
class CurrencyListDto
{
    /**
     * @var CurrencyDto[]
     *
     * @Serializer\Type("array<App\Services\Currency\ExternalProvider\Dto\CurrencyDto>")
     * @Serializer\XmlList(inline=true, entry="Item")
     *
     */
    private $currencies;

    public function __construct(array $currencies)
    {
        $this->currencies = $currencies;
    }

    public function getCurrencies(): array
    {
        return $this->currencies;
    }
}
