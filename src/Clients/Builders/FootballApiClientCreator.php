<?php

namespace Lcarr\FootballApiSdk\Clients\Builders;

use Lcarr\FootballApiSdk\Clients\FootballApiClientInterface;
use Lcarr\FootballApiSdk\Clients\FootballApiConfig;
use Lcarr\FootballApiSdk\Clients\Methods\ClientMethodFactory;

class FootballApiClientCreator
{
    private FootballApiClientBuilder $footballApiClientBuilder;

    public function __construct(FootballApiClientBuilder $footballApiClientBuilder)
    {
        $this->footballApiClientBuilder = $footballApiClientBuilder;
    }

    public function create(FootballApiConfig $footballApiConfig): FootballApiClientInterface
    {
        $this->footballApiClientBuilder->addClientMethod(ClientMethodFactory::createClientMethod($footballApiConfig['client-method']));
        $this->footballApiClientBuilder->addHeadersFromConfig($footballApiConfig);

        return $this->footballApiClientBuilder->getFootballApiClient();
    }
}