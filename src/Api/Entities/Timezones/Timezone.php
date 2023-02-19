<?php

namespace Lcarr\FootballApiSdk\Api\Entities\Timezones;

class Timezone
{
    public function __construct(private string $timezone)
    {}

    public function getTimezone(): string
    {
        return $this->timezone;
    }
}