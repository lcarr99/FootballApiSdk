<?php

namespace Lcarr\FootballApiSdk\Api\Entities;

use Countable;

class ResultsCount implements Countable
{
    private int $resultCount;

    public function __construct(int $resultCount)
    {
        $this->resultCount = $resultCount;
    }

    public function count(): int
    {
        return $this->resultCount;
    }
}