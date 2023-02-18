<?php

namespace Lcarr\FootballApiSdk\Api\Entities;

use Countable;

class ResultsCount implements Countable
{
    public function __construct(private int $resultCount)
    {}

    /**
     * @return int
     */
    public function count(): int
    {
        return $this->resultCount;
    }
}