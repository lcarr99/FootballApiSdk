<?php

namespace Lcarr\FootballApiSDK\Api\Models;

use Lcarr\FootballApiSdk\Api\Entities\Country;

class CountriesModel
{
    private string $collectionName;
    private array $parameters;
    private array $errors;
    private int $resultCount;
    private array $countries;

    public function __construct(array $countryResponseData)
    {
        $this->collectionName = $countryResponseData['get'];
        $this->parameters = $countryResponseData['parameters'];
        $this->errors = $countryResponseData['errors'];
        $this->resultCount = $countryResponseData['results'];
        $this->countries = array_map(function ($countryData) {
            return new Country($countryData);
        }, $countryResponseData['response']);
    }

    /**
     * @return string
     */
    public function getCollectionName(): string
    {
        return $this->collectionName;
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * @return int
     */
    public function getResultCount(): int
    {
        return $this->resultCount;
    }

    /**
     * @return array
     */
    public function getCountries(): array
    {
        return $this->countries;
    }
}