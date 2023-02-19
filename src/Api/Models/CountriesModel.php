<?php

namespace Lcarr\FootballApiSdk\Api\Models;

use JsonSerializable;
use Lcarr\FootballApiSdk\Api\Entities\Collections\CountryCollection;
use Lcarr\FootballApiSdk\Api\Entities\CollectionName;
use Lcarr\FootballApiSdk\Api\Entities\Errors\FootballApiErrorInterface;
use Lcarr\FootballApiSdk\Api\Entities\Parameters;
use Lcarr\FootballApiSdk\Api\Entities\ResultsCount;

class CountriesModel implements JsonSerializable, Model
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