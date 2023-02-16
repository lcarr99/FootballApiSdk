<?php

use Lcarr\FootballApiSdk\Api\CountriesApi;
use Lcarr\FootballApiSdk\Api\Entities\Errors\EmptyFootballApiError;
use Lcarr\FootballApiSdk\Clients\FootballApiClient;
use PHPUnit\Framework\TestCase;

class CountriesApiTest extends TestCase
{
    /**
     * @param string $countryName
     * @param array $response
     * @dataProvider sampleCountryApiOfNameResponseArrays
     */
    public function testResponseModelFromOfNameIsCorrect(string $countryName, array $response)
    {
        $stubFootballApiClient = $this->createStub(FootballApiClient::class);

        $stubFootballApiClient->method('send')->willReturn($response);

        $countriesApi = new CountriesApi($stubFootballApiClient);

        $countriesResponse = $countriesApi->ofName($countryName);

        $this->assertSame(1, count($countriesResponse->getCountries()));
        $this->assertSame(1, $countriesResponse->getResultCount()->count());
        $this->assertInstanceOf(EmptyFootballApiError::class, $countriesResponse->getErrors());
        $this->assertSame('countries', $countriesResponse->getCollectionName()->getCollectionName());
    }

    public function sampleCountryApiOfNameResponseArrays(): array
    {
        return [
            'searchTermEngland' => [
                'england',
                [
                    'get' => 'countries',
                    'parameters' => [
                        'name' => 'england',
                    ],
                    'errors' => [],
                    'results' => 1,
                    'paging' => [
                        'current' => 1,
                        'total' => 1,
                    ],
                    'response' => [
                        [
                            'name' => 'England',
                            'code' => 'GB',
                            'flag' => 'https://media.api-sports.io/flags/gb.svg',
                        ],
                    ],
                ],
            ],
            'searchTermFrance' => [
                'france',
                [
                    'get' => 'countries',
                    'parameters' => [
                        'name' => 'france',
                    ],
                    'errors' => [],
                    'results' => 1,
                    'paging' => [
                        'current' => 1,
                        'total' => 1,
                    ],
                    'response' => [
                        [
                            'name' => 'France',
                            'code' => 'FR',
                            'flag' => 'https://media.api-sports.io/flags/fr.svg',
                        ],
                    ],
                ],
            ],
        ];
    }
}