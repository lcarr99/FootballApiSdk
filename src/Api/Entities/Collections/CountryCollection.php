<?php

namespace Lcarr\FootballApiSdk\Api\Entities\Collections;

use Lcarr\FootballApiSDK\Api\Entities\Countries\Country;

class CountryCollection extends Collection
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