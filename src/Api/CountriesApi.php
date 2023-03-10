<?php

namespace Lcarr\FootballApiSdk\Api;

use Lcarr\FootballApiSdk\Api\Models\CountriesModel;
use Lcarr\FootballApiSdk\Clients\FootballApiClient;

class CountriesApi
{
    private const COUNTRIES_URL = 'countries';

    public function __construct(Private FootballApiClient $footballApiClient)
    {}

    /**
     * @param string $name
     * @return CountriesModel
     */
    public function ofName(string $name): CountriesModel
    {
        $url = self::COUNTRIES_URL . '?' . http_build_query(['name' => $name]);
        $response = $this->footballApiClient->send('GET', $url);
        return new CountriesModel($response);
    }

    /**
     * @param string $code
     * @return CountriesModel
     */
    public function ofCode(string $code): CountriesModel
    {
        $url = self::COUNTRIES_URL . '?' . http_build_query(['code' => $code]);
        $response = $this->footballApiClient->send('GET', $url);

        return new CountriesModel($response);
    }

    /**
     * @param string $searchTerm
     * @return CountriesModel
     */
    public function search(string $searchTerm): CountriesModel
    {
        $url = self::COUNTRIES_URL . '?' . http_build_query(['search' => $searchTerm]);
        $response = $this->footballApiClient->send('GET', $url);

        return new CountriesModel($response);
    }

    /**
     * @return CountriesModel
     */
    public function all(): CountriesModel
    {
        $response = $this->footballApiClient->send('GET', self::COUNTRIES_URL);

        return new CountriesModel($response);
    }
}
