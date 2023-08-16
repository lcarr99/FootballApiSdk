<?php

namespace Lcarr\FootballApiSdk\Api;

use Lcarr\FootballApiSdk\Api\Models\CountriesModel;
use Lcarr\FootballApiSdk\Clients\FootballApiClient;

class CountriesApi
{
    /**
     * @var string
     */
    private readonly string $url = 'countries';

    /**
     * @param FootballApiClient $footballApiClient
     */
    public function __construct(Private FootballApiClient $footballApiClient)
    {}

    /**
     * @param string $name
     * @return CountriesModel
     */
    public function ofName(string $name): CountriesModel
    {
        $url = self::COUNTRIES_URL . '?' . http_build_query(['name' => $name]);
        return CountriesModel::createFromResponse($this->footballApiClient->send('GET', $url));
    }

    /**
     * @param string $code
     * @return CountriesModel
     */
    public function ofCode(string $code): CountriesModel
    {
        $url = self::COUNTRIES_URL . '?' . http_build_query(['code' => $code]);
        return CountriesModel::createFromResponse($this->footballApiClient->send('GET', $url));
    }

    /**
     * @param string $searchTerm
     * @return CountriesModel
     */
    public function search(string $searchTerm): CountriesModel
    {
        $url = self::COUNTRIES_URL . '?' . http_build_query(['search' => $searchTerm]);
        return CountriesModel::createFromResponse($this->footballApiClient->send('GET', $url));
    }

    /**
     * @return CountriesModel
     */
    public function all(): CountriesModel
    {
        return CountriesModel::createFromResponse($this->footballApiClient->send('GET', $this->url));
    }

    /**
     * @return string
     */
    final public function getUrl(): string
    {
        return $this->url;
    }
}
