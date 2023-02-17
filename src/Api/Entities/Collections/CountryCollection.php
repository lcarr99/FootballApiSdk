<?php

namespace Lcarr\FootballApiSdk\Api\Entities\Collections;

use ArrayAccess;
use Countable;
use Lcarr\FootballApiSDK\Api\Entities\Countries\Country;

class CountryCollection implements Countable, ArrayAccess
{
    /**
     * @var Country[]
     */
    private array $countries;

    public function __construct(array $countries)
    {
        $this->countries = $countries;
    }

    public function count(): int
    {
        return count($this->countries);
    }

    public function offsetExists($offset): bool
    {
        return isset($this->countries[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->countries[$offset] ?? null;
    }

    public function offsetSet($offset, $value): void
    {
        $this->countries[$offset] = $value;
    }

    public function offsetUnset($offset): void
    {
        unset($this->countries[$offset]);
    }
}