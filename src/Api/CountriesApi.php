<?php

namespace Lcarr\FootballApiSdk\Api;

use Lcarr\FootballApiSdk\Api\Models\CountriesModel;
use Lcarr\FootballApiSdk\Clients\FootballApiClient;

class CountriesApi
{
    private const COUNTRIES_URL = 'countries';

    private FootballApiClient $client;

    public function __construct(FootballApiClient $footballApiClient)
    {
        $this->client = $footballApiClient;
    }

    public function ofName(string $name): CountriesModel
    {
        $url = self::COUNTRIES_URL . '?' . http_build_query(['name' => $name]);
        $response = $this->client->send('GET', $url);

        return new CountriesModel($response);
    }

    public function ofCode(string $code): CountriesModel
    {
        $url = self::COUNTRIES_URL . '?' . http_build_query(['code' => $code]);
        $response = $this->client->send('GET', $url);

        return new CountriesModel($response);
    }

    public function search(string $searchTerm): CountriesModel
    {
        $url = self::COUNTRIES_URL . '?' . http_build_query(['search' => $searchTerm]);
        $response = $this->client->send('GET', $url);

        return new CountriesModel($response);
    }

    public function all(): CountriesModel
    {
        $response = $this->client->send('GET', self::COUNTRIES_URL);

        return new CountriesModel($response);
    }
}
