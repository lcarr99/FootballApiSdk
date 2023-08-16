<?php

namespace Lcarr\FootballApiSDK\Api\Entities\Leagues\League;

class Fixtures
{
    public function __construct(
        private bool $events,
        private bool $lineups,
        private bool $statisticsFixtures,
        private bool $statisticsPlayers,
    )
    {}

    /**
     * @return bool
     */
    public function hasEvents(): bool
    {
        return $this->events;
    }

    /**
     * @return bool
     */
    public function hasLineups(): bool
    {
        return $this->lineups;
    }

    /**
     * @return bool
     */
    public function hasStatisticsFixtures(): bool
    {
        return $this->statisticsFixtures;
    }

    /**
     * @return bool
     */
    public function hasStatisticsPlayers(): bool
    {
        return $this->statisticsPlayers;
    }
}