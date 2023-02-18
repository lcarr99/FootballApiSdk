<?php

use Lcarr\FootballApiSdk\Clients\ApiSportsClient;
use Lcarr\FootballApiSdk\Clients\Builders\ApiSportsClientBuilder;
use Lcarr\FootballApiSdk\Clients\Builders\FootballApiClientCreator;
use Lcarr\FootballApiSdk\Clients\FootballApiConfig;
use Lcarr\FootballApiSdk\Clients\Methods\CurlMethod;
use Lcarr\FootballApiSdk\FootballApiSdkException;
use PHPUnit\Framework\TestCase;

class ApiSportsClientBuilderTest extends TestCase
{
    public function testApiSportsClientBuildsCorrectlyWithCurlMethodAndCorrectConfig()
    {
        $apiSportsBuilder = new ApiSportsClientBuilder();
        $config = FootballApiConfig::create([
            'api-client' => 'api-sports',
            'client-method' => 'curl',
            'api-sports-key' => 'xxxxxx',
        ]);
        $footballApiClientCreator = new FootballApiClientCreator($apiSportsBuilder);
        $this->assertInstanceOf(ApiSportsClient::class, $footballApiClientCreator->create($config));
    }

    public function testExceptionIsThrownWhenApiSportsKeyIsntSetInConfigWhenAddingHeaders()
    {
        $this->expectException(FootballApiSdkException::class);
        $config = new FootballApiConfig([
            'api-client' => 'api-sports',
        ]);
        $apiSportsClientBuilder = new ApiSportsClientBuilder();

        $apiSportsClientBuilder->addHeadersFromConfig($config);
    }
}