<?php

namespace Lcarr\FootballApiSdk\Api\Entities\Collections;

use Lcarr\FootballApiSdk\Api\Entities\Timezones\Timezone;

final class TimezoneCollection extends Collection
{
    public function jsonSerialize(): mixed
    {
        return array_map(fn (Timezone $timezone) => [
            'timezone' => $timezone->getTimezone(),
        ], $this->collectionData);
    }
}