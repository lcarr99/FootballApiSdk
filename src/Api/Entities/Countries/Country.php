<?php

namespace Lcarr\FootballApiSDK\Api\Entities\Countries;

class Country
{
    private array $container;

    public function __construct(array $countryData)
    {
        $this->container = $countryData;
    }

    public function getName(): string
    {
        return $this->container['name'];
    }

    public function getCode(): string
    {
        return $this->container['code'];
    }

    public function getFlagUrl(): string
    {
        return $this->container['flag'];
    }
}