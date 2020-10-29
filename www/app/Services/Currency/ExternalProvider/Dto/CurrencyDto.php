<?php

declare(strict_types=1);

namespace App\Services\Currency\ExternalProvider\Dto;


use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\XmlRoot("Item")
 */
class CurrencyDto
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Name")
     */
    private $name;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("EngName")
     */
    private $engName;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Nominal")
     */
    private $nominal;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ISO_Char_Code")
     */
    private $code;

    public function getName(): string
    {
        return $this->name;
    }

    public function getEngName(): string
    {
        return $this->engName;
    }

    public function getNominal(): string
    {
        return $this->nominal;
    }

    public function getCode(): string
    {
        return $this->code;
    }
}
