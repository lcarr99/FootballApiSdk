<?php

namespace Lcarr\FootballApiSdk\Api\Entities\Errors;

use DateTimeImmutable;

interface FootballApiErrorInterface
{
    public function getMessage(): string;
    public function getReport(): string;
    public function getDateTimeImmutable(): ?DateTimeImmutable;
}