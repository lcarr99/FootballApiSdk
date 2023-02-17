<?php

namespace Lcarr\FootballApiSdk\Api\Entities;

use Countable;

class Parameters implements Countable
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

    public function count(): int
    {
        return count($this->parameters);
    }
}