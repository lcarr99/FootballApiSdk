<?php

namespace Lcarr\FootballApiSdk\Timezones\Entities;

class Timezone
{
    public function __construct(private string $timezone)
    {}

    public function getTimezone(): string
    {
        return $this->timezone;
    }
}