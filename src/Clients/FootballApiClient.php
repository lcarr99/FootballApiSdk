<?php

namespace Lcarr\FootballApiSdk\Clients;

use Lcarr\FootballApiSdk\Clients\Builders\FootballApiClientBuilderFactory;
use Lcarr\FootballApiSdk\Clients\Builders\FootballApiClientCreator;

class FootballApiClient implements FootballApiClientInterface
{
    private FootballApiClientInterface $client;

    public function __construct(FootballApiConfig $config)
    {
        $clientBuilder = FootballApiClientBuilderFactory::createFootballApiClientBuilder($config['api-client']);
        $clientCreator = new FootballApiClientCreator($clientBuilder);

        $this->client = $clientCreator->create($config);
    }

    public function send(string $method, string $url): array
    {
        return $this->client->send($method, $url);
    }
}