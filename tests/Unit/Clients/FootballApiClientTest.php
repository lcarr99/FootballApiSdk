<?php

namespace Lcarr\FootballApiSdk\Tests\Unit\Clients;

use Lcarr\FootballApiSdk\Clients\FootballApiClient;
use Lcarr\FootballApiSdk\Clients\FootballApiConfig;
use PHPUnit\Framework\TestCase;

class FootballApiClientTest extends TestCase
{
    /**
     * @dataProvider validConfigCases
     */
    public function testExceptionIsntThrownWithValidConfig(FootballApiConfig $config)
    {
        new FootballApiClient($config);
        // assert if no exception is thrown
        $this->assertTrue(true);
    }

    public function validConfigCases()
    {
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
    }
}