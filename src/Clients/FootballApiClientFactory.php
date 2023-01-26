<?php

namespace Lcarr\FootballApiSdk\Clients;

use InvalidArgumentException;

class FootballApiClientFactory
{
    public static function createApiClient(string $apiClientName): FootballApiClientInterface
    {
        if ($apiClientName === 'rapid-api') {
            return new RapidApiClient();
        }

        if ($apiClientName === 'api-sports') {
            return new ApiSportsClient();
        }

        throw new InvalidArgumentException('The client name should be set to either rapid-api or api-sports');
    }
}