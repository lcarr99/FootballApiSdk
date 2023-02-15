<?php

namespace Lcarr\FootballApiSdk\Clients\Builders;

use Lcarr\FootballApiSdk\Clients\FootballApiClientInterface;
use Lcarr\FootballApiSdk\Clients\FootballApiConfig;
use Lcarr\FootballApiSdk\Clients\Methods\ClientMethod;
use Lcarr\FootballApiSdk\Clients\RapidApiClient;
use Lcarr\FootballApiSdk\Clients\Requests\Headers;
use Lcarr\FootballApiSdk\FootballApiSdkException;

class RapidApiClientBuilder implements FootballApiClientBuilder
{
    private ClientMethod $clientMethod;
    private Headers $headers;

    public function addClientMethod(ClientMethod $clientMethod): void
    {
        $this->clientMethod = $clientMethod;
    }

    public function addHeadersFromConfig(FootballApiConfig $config)
    {
        if (!isset($config['rapid-api-host'])) {
            throw new FootballApiSdkException('Please make sure the rapid-api-host is set in the config.');
        }

        if (!isset($config['rapid-api-key'])) {
            throw new FootballApiSdkException('Please make sure the rapid-api-key is set in the config.');
        }

        $this->headers = new Headers([
            'X-RapidAPI-Key' => $config['rapid-api-key'],
            'X-RapidAPI-Host' => $config['rapid-api-host'],
        ]);
    }

    public function getFootballApiClient(): FootballApiClientInterface
    {
        return new RapidApiClient($this->clientMethod, $this->headers);
    }
}