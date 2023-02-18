<?php

namespace Lcarr\FootballApiSdk\Api\Entities\Collections;

use ArrayAccess;
use Countable;
use JsonSerializable;
use Lcarr\FootballApiSDK\Api\Entities\Countries\Country;

class CountryCollection implements Countable, ArrayAccess, JsonSerializable
{
    public function __construct(private array $countries)
    {}

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->countries);
    }

    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists(mixed $offset): bool
    {
        return isset($this->countries[$offset]);
    }

    /**
     * @param mixed $offset
     * @return mixed
     */
    public function offsetGet(mixed $offset): mixed
    {
        return $this->countries[$offset] ?? null;
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->countries[$offset] = $value;
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset(mixed $offset): void
    {
        unset($this->countries[$offset]);
    }

    /**
     * @return mixed
     */
    public function jsonSerialize(): mixed
    {
        return array_map(function (Country $country) {
            return [
                'name' => $country->getName(),
                'code' => $country->getCode(),
                'flag_url' => $country->getFlagUrl(),
            ];
        }, $this->countries);
    }
}