<?php

use Lcarr\FootballApiSdk\Clients\ApiSportsClient;
use Lcarr\FootballApiSdk\Clients\Builders\ApiSportsClientBuilder;
use Lcarr\FootballApiSdk\Clients\Builders\FootballApiClientCreator;
use Lcarr\FootballApiSdk\Clients\FootballApiConfig;
use Lcarr\FootballApiSdk\Clients\Exceptions\FootballApiSdkException;

test('api sports client builds correctly with curl method and correct config', function () {
    $apiSportsBuilder = new ApiSportsClientBuilder();
    $config = FootballApiConfig::create([
        'api-client' => 'api-sports',
        'client-method' => 'curl',
        'api-sports-key' => 'xxxxxx',
    ]);
    $footballApiClientCreator = new FootballApiClientCreator($apiSportsBuilder);
    expect($footballApiClientCreator->create($config))->toBeInstanceOf(ApiSportsClient::class);
});

test('api sports client builds correctly with guzzle method and correct config', function () {
    $apiSportsBuilder = new ApiSportsClientBuilder();
    $config = FootballApiConfig::create([
        'api-client' => 'api-sports',
        'client-method' => 'guzzle',
        'api-sports-key' => 'xxxxxx',
    ]);
    $footballApiClientCreator = new FootballApiClientCreator($apiSportsBuilder);
    expect($footballApiClientCreator->create($config))->toBeInstanceOf(ApiSportsClient::class);
});
test('exception is thrown when api sports key isnt set in config when adding headers', function () {
    $this->expectException(FootballApiSdkException::class);
    $config = new FootballApiConfig([
        'api-client' => 'api-sports',
    ]);
    $apiSportsClientBuilder = new ApiSportsClientBuilder();

    $apiSportsClientBuilder->addHeadersFromConfig($config);
});