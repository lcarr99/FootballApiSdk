<?php

namespace Lcarr\FootballApiSdk\Api\Models;

use JsonSerializable;
use Lcarr\FootballApiSdk\Api\Entities\Collections\CountryCollection;
use Lcarr\FootballApiSdk\Api\Entities\CollectionName;
use Lcarr\FootballApiSdk\Api\Entities\Countries\Country;
use Lcarr\FootballApiSdk\Api\Entities\Errors\FootballApiErrorInterface;
use Lcarr\FootballApiSdk\Api\Entities\Parameters;
use Lcarr\FootballApiSdk\Api\Entities\ResultsCount;
use Lcarr\FootballApiSdk\Api\Entities\Errors\EmptyFootballApiError;
use Lcarr\FootballApiSdk\Api\Entities\Errors\FootballApiError;

class CountriesModel implements JsonSerializable
{
    /**
     * @var CollectionName
     */
    private CollectionName $collectionName;
    /**
     * @var Parameters
     */
    private Parameters $parameters;
    /**
     * @var FootballApiErrorInterface
     */
    private FootballApiErrorInterface $errors;
    /**
     * @var ResultsCount
     */
    private ResultsCount $resultCount;
    /**
     * @var CountryCollection
     */
    private CountryCollection $countries;

    public function __construct(array $countryResponseData)
    {
        $this->collectionName = new CollectionName($countryResponseData['get']);
        $this->parameters = new Parameters($countryResponseData['parameters']);
        $this->errors = empty($countryResponseData['errors']) ? new EmptyFootballApiError() : new FootballApiError(
            $countryResponseData['errors']
        );
        $this->resultCount = new ResultsCount($countryResponseData['results']);
        $this->countries = new CountryCollection(array_map(function ($countryData) {
            return new Country($countryData);
        }, $countryResponseData['response']));
    }

    /**
     * @return CollectionName
     */
    public function getCollectionName(): CollectionName
    {
        return $this->collectionName;
    }

    /**
     * @return Parameters
     */
    public function getParameters(): Parameters
    {
        return $this->parameters;
    }

    /**
     * @return FootballApiErrorInterface
     */
    public function getErrors(): FootballApiErrorInterface
    {
        return $this->errors;
    }

    /**
     * @return ResultsCount
     */
    public function getResultCount(): ResultsCount
    {
        return $this->resultCount;
    }

    /**
     * @return CountryCollection
     */
    public function getCountries(): CountryCollection
    {
        return $this->countries;
    }

    /**
     * @return mixed
     */
    public function jsonSerialize(): mixed
    {
        return [
            'collection' => $this->collectionName->getCollectionName(),
            'parameter' => $this->getParameters(),
            'errors' => $this->getErrors(),
            'resultCount' => $this->resultCount->count(),
            'countries' => $this->countries,
        ];
    }
}