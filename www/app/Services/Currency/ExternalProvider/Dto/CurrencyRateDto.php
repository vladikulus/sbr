<?php

declare(strict_types=1);

namespace App\Services\Currency\ExternalProvider\Dto;

use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("Valute")
 */
class CurrencyRateDto
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("CharCode")
     */
    private $code;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Value")
     */
    private $value;

    public function getCode(): string
    {
        return $this->code;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
