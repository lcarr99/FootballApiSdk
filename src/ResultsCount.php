<?php

namespace Lcarr\FootballApiSdk;

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