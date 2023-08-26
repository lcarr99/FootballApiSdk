<?php

namespace Lcarr\FootballApiSdk\Countries\Entities\Collections;

use Lcarr\FootballApiSdk\Collection;
use Lcarr\FootballApiSDK\Countries\Entities\Country;

final class CountryCollection extends Collection
{
    /**
     * @return mixed
     */
    public function jsonSerialize(): mixed
    {
        return array_map(fn(Country $country) => [
            'name' => $country->getName(),
            'code' => $country->getCode(),
            'flag_url' => $country->getFlagUrl(),
        ], $this->collectionData);
    }
}