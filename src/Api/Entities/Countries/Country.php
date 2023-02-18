<?php

namespace Lcarr\FootballApiSDK\Api\Entities\Countries;

class Country
{
    public function __construct(private array $countryData)
    {}

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->countryData['name'];
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->countryData['code'];
    }

    /**
     * @return string
     */
    public function getFlagUrl(): string
    {
        return $this->countryData['flag'];
    }
}