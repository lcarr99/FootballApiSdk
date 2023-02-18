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
        if ($footballApiConfig['api-client'] === ApiClients::RAPID_API) {
            return new RapidApiClientBuilder();
        }

        if ($footballApiConfig['api-client'] === ApiClients::API_SPORTS) {
            return new ApiSportsClientBuilder();
        }

        throw new InvalidArgumentException('The client name should be set to either rapid-api or api-sports');
    }
}