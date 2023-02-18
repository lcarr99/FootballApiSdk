<?php

namespace Lcarr\FootballApiSdk\Api\Entities\Errors;

use DateTimeImmutable;
use JsonSerializable;

class FootballApiError implements FootballApiErrorInterface, JsonSerializable
{
    private array $container;

    public function __construct(array $errors)
    {
        $this->container = $errors;
    }

    public function getDateTimeImmutable(): ?DateTimeImmutable
    {
        return new DateTimeImmutable($this->container['time']);
    }

    public function getMessage(): string
    {
        return $this->container['bug'] ?? '';
    }

    public function getReport(): string
    {
        return $this->container['report'] ?? '';
    }

    public function jsonSerialize()
    {
        return $this->container;
    }
}