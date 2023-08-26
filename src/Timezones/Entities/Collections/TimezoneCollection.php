<?php

namespace Lcarr\FootballApiSdk\Timezones\Entities\Collections;

use Lcarr\FootballApiSdk\Timezones\Entities\Timezone;
use Lcarr\FootballApiSdk\Collection;

final class TimezoneCollection extends Collection
{
    public function jsonSerialize(): mixed
    {
        return array_map(fn (Timezone $timezone) => [
            'timezone' => $timezone->getTimezone(),
        ], $this->collectionData);
    }
}