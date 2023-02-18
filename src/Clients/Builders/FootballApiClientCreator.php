<?php

namespace Lcarr\FootballApiSdk\Clients\Builders;

use Lcarr\FootballApiSdk\Clients\FootballApiClientInterface;
use Lcarr\FootballApiSdk\Clients\FootballApiConfig;
use Lcarr\FootballApiSdk\Clients\Methods\ClientMethodFactory;
use Lcarr\FootballApiSdk\FootballApiSdkException;

class FootballApiClientCreator
{
    public function __construct(private FootballApiClientBuilder $footballApiClientBuilder)
    {}

    /**
     * @param FootballApiConfig $footballApiConfig
     * @return FootballApiClientInterface
     * @throws FootballApiSdkException
     */
    public function create(FootballApiConfig $footballApiConfig): FootballApiClientInterface
    {
        $this->footballApiClientBuilder->addClientMethod(ClientMethodFactory::createClientMethod($footballApiConfig['client-method']));
        $this->footballApiClientBuilder->addHeadersFromConfig($footballApiConfig);

        return $this->footballApiClientBuilder->getFootballApiClient();
    }
}