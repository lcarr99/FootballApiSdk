<?php

namespace Lcarr\FootballApiSdk\Clients\Builders;

use Lcarr\FootballApiSdk\Clients\FootballApiClientInterface;
use Lcarr\FootballApiSdk\Clients\FootballApiConfig;
use Lcarr\FootballApiSdk\Clients\Methods\ClientMethod;
use Lcarr\FootballApiSdk\Clients\RapidApiClient;
use Lcarr\FootballApiSdk\Clients\Requests\Header;
use Lcarr\FootballApiSdk\Clients\Requests\Headers;
use Lcarr\FootballApiSdk\FootballApiSdkException;

class RapidApiClientBuilder implements FootballApiClientBuilder
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
        $config['rapid-api-host'] ?? throw new FootballApiSdkException(
            'Please make sure the rapid-api-host is set in the config.'
        );
        $config['rapid-api-key'] ?? throw new FootballApiSdkException(
            'Please make sure the rapid-api-key is set in the config.'
        );

        $this->headers = new Headers();
        $this->headers->add(new Header('X-RapidAPI-Key', $config['rapid-api-key']));
        $this->headers->add(new Header('X-RapidAPI-Host', $config['rapid-api-host']));
    }

    /**
     * @return FootballApiClientInterface
     */
    public function getFootballApiClient(): FootballApiClientInterface
    {
        return new RapidApiClient($this->clientMethod, $this->headers);
    }
}