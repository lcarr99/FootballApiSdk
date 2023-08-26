<?php

namespace Lcarr\FootballApiSdk\Entities\Leagues;

use Lcarr\FootballApiSdk\Api\Entities\Collections\SeasonCollection;
use Lcarr\FootballApiSDK\Leagues\Entities\Leagues\League as LeagueData;
use Lcarr\FootballApiSDK\Countries\Entities\Country;

class League
{
    public function __construct(
        private LeagueData $league,
        private Country $country,
        private SeasonCollection $seasonCollection,
    )
    {}

    /**
     * @return LeagueData
     */
    public function getLeague(): LeagueData
    {
        return $this->league;
    }

    /**
     * @return Country
     */
    public function getCountry(): Country
    {
        return $this->country;
    }

    /**
     * @return SeasonCollection
     */
    public function getSeasons(): SeasonCollection
    {
        return $this->seasonCollection;
    }
}