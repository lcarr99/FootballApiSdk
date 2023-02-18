<?php

namespace Lcarr\FootballApiSdk\Api\Entities\Errors;

use DateTimeImmutable;
use Exception;
use JsonSerializable;

class FootballApiError implements FootballApiErrorInterface, JsonSerializable
{
    public function __construct(private array $error)
    {}

    /**
     * @return DateTimeImmutable|null
     * @throws Exception
     */
    public function getDateTimeImmutable(): DateTimeImmutable|null
    {
        return new DateTimeImmutable($this->error['time']);
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->error['bug'] ?? '';
    }

    /**
     * @return string
     */
    public function getReport(): string
    {
        return $this->error['report'] ?? '';
    }

    /**
     * @return mixed
     */
    public function jsonSerialize(): mixed
    {
        return $this->error;
    }
}