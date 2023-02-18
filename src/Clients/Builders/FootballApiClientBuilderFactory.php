<?php

namespace Lcarr\FootballApiSdk\Clients\Builders;

use InvalidArgumentException;
use Lcarr\FootballApiSdk\Clients\ApiClients;
use Lcarr\FootballApiSdk\Clients\FootballApiConfig;

class FootballApiClientBuilderFactory
{
    /**
     * @param FootballApiConfig $footballApiConfig
     * @return FootballApiClientBuilder
     */
    public static function createFootballApiClientBuilder(FootballApiConfig $footballApiConfig): FootballApiClientBuilder
    {
        return match ($footballApiConfig['api-client']) {
            ApiClients::RAPID_API => new RapidApiClientBuilder(),
            ApiClients::API_SPORTS => new ApiSportsClientBuilder(),
            default => throw new InvalidArgumentException(
                'The client name should be set to either rapid-api or api-sports'
            ),
        };
    }
}