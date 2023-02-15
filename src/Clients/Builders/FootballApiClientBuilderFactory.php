<?php

namespace Lcarr\FootballApiSdk\Clients\Builders;

use InvalidArgumentException;
use Lcarr\FootballApiSdk\Clients\ApiClients;

class FootballApiClientBuilderFactory
{
    public static function createFootballApiClientBuilder(string $apiClientName): FootballApiClientBuilder
    {
        if ($apiClientName === ApiClients::RAPID_API) {
            return new RapidApiClientBuilder();
        }

        if ($apiClientName === ApiClients::API_SPORTS) {
            return new ApiSportsClientBuilder();
        }

        throw new InvalidArgumentException('The client name should be set to either rapid-api or api-sports');
    }
}