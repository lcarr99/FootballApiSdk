<?php

namespace Lcarr\FootballApiSDK\Api;

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
        $response = $this->client->send(self::COUNTRIES_URL, ['query' => ['name' => $name]]);

        return new CountriesModel(json_decode($response->getBody()->getContents(), true));
    }

    public function ofCode(string $code): CountriesModel
    {
        $response = $this->client->send(self::COUNTRIES_URL, ['query' => ['code' => $code]]);

        return new CountriesModel(json_decode($response->getBody()->getContents(), true));
    }

    public function search(string $searchTerm): CountriesModel
    {
        $response = $this->client->send(self::COUNTRIES_URL, ['query' => ['search' => $searchTerm]]);

        return new CountriesModel(json_decode($response->getBody()->getContents(), true));
    }

    public function all(): CountriesModel
    {
        $response = $this->client->send(self::COUNTRIES_URL);

        return new CountriesModel(json_decode($response->getBody()->getContents(), true));
    }
}
