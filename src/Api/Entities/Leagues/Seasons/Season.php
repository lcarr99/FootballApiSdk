<?php

namespace Lcarr\FootballApiSDK\Api\Entities\Leagues\League;

use DateTimeImmutable;

class Season
{
    /**
     * @param int $year
     * @param DateTimeImmutable $startDate
     * @param DateTimeImmutable $endDate
     * @param bool $currentSeason
     * @param Coverage $coverage
     */
    public function __construct(
        private int $year,
        private DateTimeImmutable $startDate,
        private DateTimeImmutable $endDate,
        private bool $currentSeason,
        private Coverage $coverage,
    )
    {}

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getStartDate(): DateTimeImmutable
    {
        return $this->startDate;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getEndDate(): DateTimeImmutable
    {
        return $this->endDate;
    }

    /**
     * @return bool
     */
    public function isCurrentSeason(): bool
    {
        return $this->currentSeason;
    }

    /**
     * @return Coverage
     */
    public function getCoverage(): Coverage
    {
        return $this->coverage;
    }
}