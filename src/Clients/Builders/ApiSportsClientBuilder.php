<?php

namespace Lcarr\FootballApiSdk\Clients\Builders;

use Lcarr\FootballApiSdk\Clients\ApiSportsClient;
use Lcarr\FootballApiSdk\Clients\FootballApiClientInterface;
use Lcarr\FootballApiSdk\Clients\FootballApiConfig;
use Lcarr\FootballApiSdk\Clients\Methods\ClientMethod;
use Lcarr\FootballApiSdk\Clients\Requests\Headers;
use Lcarr\FootballApiSdk\FootballApiSdkException;

class ApiSportsClientBuilder implements FootballApiClientBuilder
{
    /**
     * @var ClientMethod
     */
    private ClientMethod $clientMethod;
    /**
     * @var Headers
     */
    private Headers $headers;

    /**
     * @param ClientMethod $clientMethod
     */
    public function addClientMethod(ClientMethod $clientMethod): void
    {
        $this->clientMethod = $clientMethod;
    }

    /**
     * @param FootballApiConfig $config
     * @throws FootballApiSdkException
     */
    public function addHeadersFromConfig(FootballApiConfig $config): void
    {
        $config['api-sports-key'] ?? throw new FootballApiSdkException(
            'Please make sure api-sports-key is set in the config.'
        );

        $this->headers = new Headers([
            'x-apisports-key' => $config['api-sports-key'],
        ]);
    }

    /**
     * @return FootballApiClientInterface
     */
    public function getFootballApiClient(): FootballApiClientInterface
    {
        return new ApiSportsClient($this->clientMethod, $this->headers);
    }
}