<?php

namespace Lcarr\FootballApiSdk\Tests\Unit\Clients;

use InvalidArgumentException;
use Lcarr\FootballApiSdk\Clients\ApiSportsClient;
use Lcarr\FootballApiSdk\Clients\FootballApiClientFactory;
use Lcarr\FootballApiSdk\Clients\FootballApiClientInterface;
use Lcarr\FootballApiSDK\Clients\RapidApiClient;
use PHPUnit\Framework\TestCase;

class FootballApiClientFactoryTest extends TestCase
{
    public function testFootballApiClientFactoryReturnsInstanceOfFootballApiClientInterfaceForAllValidCases()
    {
        $this->assertInstanceOf(
            FootballApiClientInterface::class,
            FootballApiClientFactory::createApiClient('rapid-api')
        );

        $this->assertInstanceOf(
            FootballApiClientInterface::class,
            FootballApiClientFactory::createApiClient('api-sports')
        );
    }

    public function testFootballApiClientFactoryReturnsRapidApiClient()
    {
        $this->assertInstanceOf(
            RapidApiClient::class,
            FootballApiClientFactory::createApiClient('rapid-api')
        );
    }

    public function testFootballApiClientFactoryReturnsApiSportsClient()
    {
        $this->assertInstanceOf(
            ApiSportsClient::class,
            FootballApiClientFactory::createApiClient('api-sports')
        );
    }

    public function testFootballApiClientFactoryThrowsInvalidArgumentException()
    {
        $this->expectException(InvalidArgumentException::class);

        FootballApiClientFactory::createApiClient('test-api');
    }
}