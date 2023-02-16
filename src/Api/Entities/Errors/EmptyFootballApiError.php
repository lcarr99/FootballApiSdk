<?php

namespace Lcarr\FootballApiSdk\Api\Entities\Errors;

use DateTimeImmutable;

class EmptyFootballApiError implements FootballApiErrorInterface
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
}