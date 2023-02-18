<?php

namespace Lcarr\FootballApiSdk\Api\Entities\Errors;

use DateTimeImmutable;
use JsonSerializable;

class EmptyFootballApiError implements FootballApiErrorInterface, JsonSerializable
{
    /**
     * @return string
     */
    public function getMessage(): string
    {
        return '';
    }

    /**
     * @return string
     */
    public function getReport(): string
    {
        return '';
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getDateTimeImmutable(): DateTimeImmutable|null
    {
        return null;
    }

    /**
     * @return mixed
     */
    public function jsonSerialize(): mixed
    {
        return [];
    }
}