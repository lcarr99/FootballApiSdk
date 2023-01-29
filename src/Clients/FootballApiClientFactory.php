<?php

namespace Lcarr\FootballApiSdk\Clients;

use InvalidArgumentException;
use Lcarr\FootballApiSdk\Clients\Methods\ClientMethod;

class FootballApiClientFactory
{
    public static function createApiClient(string $apiClientName, ClientMethod $clientMethod): FootballApiClientInterface
    {
        if ($apiClientName === 'rapid-api') {
            return new RapidApiClient($clientMethod);
        }

        if ($apiClientName === 'api-sports') {
            return new ApiSportsClient($clientMethod);
        }

        throw new InvalidArgumentException('The client name should be set to either rapid-api or api-sports');
    }
}