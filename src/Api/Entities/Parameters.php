<?php

namespace Lcarr\FootballApiSdk\Api\Entities;

class Parameters
{
    private array $parameters;

    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
    }

    public function getParameter(string $name): ?string
    {
        return $this->parameters[$name] ?? null;
    }
}