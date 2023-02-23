<?php

namespace Lcarr\FootballApiSdk\Clients;

use Lcarr\FootballApiSdk\Clients\Builders\FootballApiClientBuilderFactory;
use Lcarr\FootballApiSdk\Clients\Builders\FootballApiClientCreator;

class FootballApiClient implements FootballApiClientInterface
{
    /**
     * @var FootballApiClientInterface
     */
    private FootballApiClientInterface $client;

    public function __construct(FootballApiConfig $config)
    {
        $clientBuilder = FootballApiClientBuilderFactory::createFootballApiClientBuilder($config);
        $clientCreator = new FootballApiClientCreator($clientBuilder);

        $this->client = $clientCreator->create($config);
    }

    /**
     * @param string $method
     * @param string $url
     * @return array
     */
    public function send(string $method, string $url): Response
    {
        return $this->client->send($method, $url);
    }
}