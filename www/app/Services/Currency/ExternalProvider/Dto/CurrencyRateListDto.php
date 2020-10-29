<?php

declare(strict_types=1);

namespace App\Services\Currency\ExternalProvider\Dto;


use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("ValCurs")
 */
class CurrencyRateListDto
{
    /**
     * @var CurrencyRateDto[]
     *
     * @Serializer\Type("array<App\Services\Currency\ExternalProvider\Dto\CurrencyRateDto>")
     * @Serializer\XmlList(inline=true, entry="Valute")
     *
     */
    private $rates;

    public function __construct(array $rates)
    {
        $this->rates = $rates;
    }

    public function getRates(): array
    {
        return $this->rates;
    }
}
