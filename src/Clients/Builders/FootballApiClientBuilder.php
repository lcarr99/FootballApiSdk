<?php

namespace Lcarr\FootballApiSdk\Clients\Builders;

use Lcarr\FootballApiSdk\Clients\FootballApiClientInterface;
use Lcarr\FootballApiSdk\Clients\FootballApiConfig;
use Lcarr\FootballApiSdk\Clients\Methods\ClientMethod;
use Lcarr\FootballApiSdk\Clients\Requests\Headers;

interface FootballApiClientBuilder
{
    public function addClientMethod(ClientMethod $clientMethod): void;
    public function addHeadersFromConfig(FootballApiConfig $config): void;
    public function getFootballApiClient(): FootballApiClientInterface;
}