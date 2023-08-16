<?php

namespace Lcarr\FootballApiSdk\Api\Leagues;

use Lcarr\FootballApiSdk\Api\Entities\Collections\SeasonCollection;
use Lcarr\FootballApiSDK\Api\Entities\Countries\Country;
use Lcarr\FootballApiSDK\Api\Entities\Leagues\League\League as LeagueData;

class League
{
    public function __construct(
        private LeagueData $league,
        private Country $country,
        private SeasonCollection $seasonCollection,

    )
    {

    }
}