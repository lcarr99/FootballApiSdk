<?php

use Lcarr\FootballApiSdk\Clients\Builders\ApiSportsClientBuilder;
use Lcarr\FootballApiSdk\Clients\Builders\FootballApiClientBuilderFactory;
use Lcarr\FootballApiSdk\Clients\Builders\RapidApiClientBuilder;
use Lcarr\FootballApiSdk\Clients\FootballApiConfig;
use PHPUnit\Framework\TestCase;

class FootballApiClientBuilderFactoryTest extends TestCase
{
    public function testApiSportsClientBuilderIsReturnedWhenItIsSpecifiedInConfig()
    {
        $config = FootballApiConfig::create([
            'api-client' => 'api-sports',
            'client-method' => 'curl',
        ]);

        $this->assertInstanceOf(
            ApiSportsClientBuilder::class,
            FootballApiClientBuilderFactory::createFootballApiClientBuilder($config)
        );

        $config = FootballApiConfig::create([
            'api-client' => 'api-sports',
            'client-method' => 'guzzle',
        ]);

        $this->assertInstanceOf(
            ApiSportsClientBuilder::class,
            FootballApiClientBuilderFactory::createFootballApiClientBuilder($config)
        );
    }

    public function testRapidApiClientBuilderIsReturnedWhenItIsSpecifiedInConfig()
    {
        $config = FootballApiConfig::create([
            'api-client' => 'rapid-api',
            'client-method' => 'curl',
        ]);

        $this->assertInstanceOf(
            RapidApiClientBuilder::class,
            FootballApiClientBuilderFactory::createFootballApiClientBuilder($config)
        );

        $config = FootballApiConfig::create([
            'api-client' => 'rapid-api',
            'client-method' => 'guzzle',
        ]);

        $this->assertInstanceOf(
            RapidApiClientBuilder::class,
            FootballApiClientBuilderFactory::createFootballApiClientBuilder($config)
        );
    }
}