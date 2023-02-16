<?php

namespace Lcarr\FootballApiSdk\Clients\Builders;

use JetBrains\PhpStorm\Pure;
use Lcarr\FootballApiSdk\Clients\ApiSportsClient;
use Lcarr\FootballApiSdk\Clients\FootballApiClientInterface;
use Lcarr\FootballApiSdk\Clients\FootballApiConfig;
use Lcarr\FootballApiSdk\Clients\Methods\ClientMethod;
use Lcarr\FootballApiSdk\Clients\Requests\Headers;
use Lcarr\FootballApiSdk\FootballApiSdkException;

class ApiSportsClientBuilder implements FootballApiClientBuilder
{
    private ClientMethod $clientMethod;
    private Headers $headers;

    public function addClientMethod(ClientMethod $clientMethod): void
    {
        $this->clientMethod = $clientMethod;
    }

    public function addHeadersFromConfig(FootballApiConfig $config)
    {
        if (!isset($config['api-sports-key'])) {
            throw new FootballApiSdkException('Please make sure api-sports-key is set in the config.');
        }

        $this->headers = new Headers([
            'x-apisports-key' => $config['api-sports-key'],
        ]);
    }

    public function getFootballApiClient(): FootballApiClientInterface
    {
        return new ApiSportsClient($this->clientMethod, $this->headers);
    }
}