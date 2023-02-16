<?php

use Lcarr\FootballApiSdk\Clients\Builders\ApiSportsClientBuilder;
use Lcarr\FootballApiSdk\Clients\FootballApiConfig;
use Lcarr\FootballApiSdk\FootballApiSdkException;
use PHPUnit\Framework\TestCase;

class ApiSportsClientBuilderTest extends TestCase
{
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