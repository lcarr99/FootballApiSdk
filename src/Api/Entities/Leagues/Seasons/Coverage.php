<?php

namespace Lcarr\FootballApiSDK\Api\Entities\Leagues\League;

class Coverage
{
    /**
     * @param Fixtures $fixtures
     * @param bool $standings
     * @param bool $players
     * @param bool $topScorers
     * @param bool $topAssists
     * @param bool $topCards
     * @param bool $injuries
     * @param bool $predictions
     * @param bool $odds
     */
    public function __construct(
        private Fixtures $fixtures,
        private bool $standings,
        private bool $players,
        private bool $topScorers,
        private bool $topAssists,
        private bool $topCards,
        private bool $injuries,
        private bool $predictions,
        private bool $odds,
    )
    {}

    /**
     * @return Fixtures
     */
    public function getFixtures(): Fixtures
    {
        return $this->fixtures;
    }

    /**
     * @return bool
     */
    public function hasStandings(): bool
    {
        return $this->standings;
    }

    /**
     * @return bool
     */
    public function hasPlayers(): bool
    {
        return $this->players;
    }

    /**
     * @return bool
     */
    public function hasTopScorers(): bool
    {
        return $this->topScorers;
    }

    /**
     * @return bool
     */
    public function hasTopAssists(): bool
    {
        return $this->topAssists;
    }

    /**
     * @return bool
     */
    public function hasTopCards(): bool
    {
        return $this->topCards;
    }

    /**
     * @return bool
     */
    public function hasInjuries(): bool
    {
        return $this->injuries;
    }

    /**
     * @return bool
     */
    public function hasPredictions(): bool
    {
        return $this->predictions;
    }

    /**
     * @return bool
     */
    public function hasOdds(): bool
    {
        return $this->odds;
    }
}