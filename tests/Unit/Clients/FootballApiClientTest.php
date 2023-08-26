<?php

use Lcarr\FootballApiSdk\Clients\FootballApiClient;
use Lcarr\FootballApiSdk\Clients\FootballApiConfig;

test('exception isnt thrown with valid config', function (FootballApiConfig $config) {
    new FootballApiClient($config);

    // assert if no exception is thrown
    expect(true)->toBeTrue();
})->with('validConfigCases');

dataset('validConfigCases', function () {
    return [
        'validRapidApiWithGuzzleMethod' => [
            FootballApiConfig::create([
                'client-method' => 'guzzle',
                'api-client' => 'rapid-api',
                'rapid-api-key' => 'xxxxxx',
                'rapid-api-host' => 'test.com'
            ]),
        ],
        'validRapidApiWithCurlMethod' => [
            FootballApiConfig::create([
                'client-method' => 'curl',
                'api-client' => 'rapid-api',
                'rapid-api-key' => 'xxxxxx',
                'rapid-api-host' => 'test.com'
            ]),
        ],
        'validApiSportsWithGuzzleMethod' => [
            FootballApiConfig::create([
                'client-method' => 'guzzle',
                'api-client' => 'api-sports',
                'api-sports-key' => 'xxxxxx',
            ]),
        ],
        'validApiSportsWithCurlMethod' => [
            FootballApiConfig::create([
                'client-method' => 'curl',
                'api-client' => 'api-sports',
                'api-sports-key' => 'xxxxxx',
            ]),
        ],
    ];
});
