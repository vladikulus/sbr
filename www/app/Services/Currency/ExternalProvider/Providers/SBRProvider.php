<?php

declare(strict_types=1);

namespace App\Services\Currency\ExternalProvider\Providers;


use App\Services\Currency\Rates\CurrencyRatesProviderInterface;
use App\Services\Currency\Updater\CurrencyProviderInterface;
use Illuminate\Support\Facades\Http;
use JMS\Serializer\SerializerInterface;

class SBRProvider implements CurrencyRatesProviderInterface, CurrencyProviderInterface
{
    private const RESPONSE_FORMAT = 'xml';

    /**
     * @var string
     */
    private $sbrURL;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var string
     */
    private $dto;

    public function __construct(string $sbrURL, SerializerInterface $serializer, string $dto)
    {
        $this->sbrURL = $sbrURL;
        $this->serializer = $serializer;
        $this->dto = $dto;
    }

    public function getData(): object
    {
        return $this->parseData($this->makeRequest());
    }

    private function makeRequest(): string
    {
        return Http::get($this->sbrURL)->body();
    }

    private function parseData(string $data)
    {
        return $this->serializer->deserialize($data, $this->dto, self::RESPONSE_FORMAT);
    }
}
