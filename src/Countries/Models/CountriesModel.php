<?php

namespace Lcarr\FootballApiSdk\Countries\Models;

use JsonSerializable;
use Lcarr\FootballApiSdk\Countries\Entities\Collections\CountryCollection;
use Lcarr\FootballApiSdk\CreatableFromResponse;
use Lcarr\FootballApiSdk\CollectionName;
use Lcarr\FootballApiSdk\Errors\EmptyFootballApiError;
use Lcarr\FootballApiSdk\Errors\FootballApiError;
use Lcarr\FootballApiSdk\Errors\FootballApiErrorInterface;
use Lcarr\FootballApiSdk\Parameters;
use Lcarr\FootballApiSdk\ResultsCount;
use Lcarr\FootballApiSdk\ModelInterface;
use Lcarr\FootballApiSdk\Clients\Response;
use Lcarr\FootballApiSdk\Countries\Entities\Country;

class CountriesModel implements JsonSerializable, ModelInterface, CreatableFromResponse
{
    public function __construct(
        private CollectionName $collectionName,
        private Parameters $parameters,
        private FootballApiErrorInterface $errors,
        private ResultsCount $resultCount,
        private CountryCollection $countries
    )
    {}

    /**
     * @param Response $response
     * @return CountriesModel
     */
    public static function createFromResponse(Response $response): CountriesModel
    {
        $responseArray = $response->getBody();
        $collectionName = new CollectionName($responseArray['get']);
        $parameters = new Parameters($responseArray['parameters']);
        $errors = empty($responseArray['errors']) ? new EmptyFootballApiError() : new FootballApiError(
            $responseArray['errors']
        );
        $resultCount = new ResultsCount($responseArray['results']);
        $countries = new CountryCollection(
            array_map(fn(array $countryData) => new Country(
                $countryData['name'],
                $countryData['code'] ?? '',
                $countryData['flag'] ?? ''
            ), $responseArray['response'])
        );

        return new self($collectionName, $parameters, $errors, $resultCount, $countries);
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