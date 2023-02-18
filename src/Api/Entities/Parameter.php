<?php

namespace Lcarr\FootballApiSdk\Api\Entities;

class Parameter
{
    public function __construct(
        private string $name,
        private string $value
    ) {}

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
    public function getValue(): string
    {
        return $this->value;
    }
}