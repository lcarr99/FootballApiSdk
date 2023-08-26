<?php

use Lcarr\FootballApiSdk\Clients\Builders\ApiSportsClientBuilder;
use Lcarr\FootballApiSdk\Clients\Builders\FootballApiClientBuilderFactory;
use Lcarr\FootballApiSdk\Clients\Builders\RapidApiClientBuilder;
use Lcarr\FootballApiSdk\Clients\FootballApiConfig;
test('api sports client builder is returned when it is specified in config', function () {
    $config = FootballApiConfig::create([
        'api-client' => 'api-sports',
        'client-method' => 'curl',
    ]);

    expect(FootballApiClientBuilderFactory::createFootballApiClientBuilder($config))->toBeInstanceOf(ApiSportsClientBuilder::class);

    $config = FootballApiConfig::create([
        'api-client' => 'api-sports',
        'client-method' => 'guzzle',
    ]);

    expect(FootballApiClientBuilderFactory::createFootballApiClientBuilder($config))->toBeInstanceOf(ApiSportsClientBuilder::class);
});

test('rapid api client builder is returned when it is specified in config', function () {
    $config = FootballApiConfig::create([
        'api-client' => 'rapid-api',
        'client-method' => 'curl',
    ]);

    expect(FootballApiClientBuilderFactory::createFootballApiClientBuilder($config))->toBeInstanceOf(RapidApiClientBuilder::class);

    $config = FootballApiConfig::create([
        'api-client' => 'rapid-api',
        'client-method' => 'guzzle',
    ]);

    expect(FootballApiClientBuilderFactory::createFootballApiClientBuilder($config))->toBeInstanceOf(RapidApiClientBuilder::class);
});