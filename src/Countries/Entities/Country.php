<?php

namespace Lcarr\FootballApiSDK\Countries\Entities;

class Country
{
    /**
     * @param string $name
     * @param string $code
     * @param string $flagUrl
     */
    public function __construct(
        private string $name,
        private string $code,
        private string $flagUrl
    )
    {}

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getFlagUrl(): string
    {
        return $this->flagUrl;
    }
}