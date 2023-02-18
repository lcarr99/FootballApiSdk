<?php

namespace Lcarr\FootballApiSdk\Api\Entities\Errors;

use DateTimeImmutable;
use JsonSerializable;

class EmptyFootballApiError implements FootballApiErrorInterface, JsonSerializable
{
    public function getMessage(): string
    {
        return '';
    }

    public function getReport(): string
    {
        return '';
    }

    public function getDateTimeImmutable(): ?DateTimeImmutable
    {
        return null;
    }

    public function jsonSerialize()
    {
        return [];
    }
}