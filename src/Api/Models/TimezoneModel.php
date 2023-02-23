<?php

namespace Lcarr\FootballApiSdk\Api\Models;

use Lcarr\FootballApiSdk\Api\Entities\CollectionName;
use Lcarr\FootballApiSdk\Api\Entities\Collections\TimezoneCollection;
use Lcarr\FootballApiSdk\Api\Entities\Errors\FootballApiErrorInterface;
use Lcarr\FootballApiSdk\Api\Entities\Parameters;
use Lcarr\FootballApiSdk\Api\Entities\ResultsCount;

class TimezoneModel implements Model
{
    /**
     * @param CollectionName $collectionName
     * @param Parameters $parameters
     * @param FootballApiErrorInterface $errors
     * @param ResultsCount $resultCount
     * @param TimezoneCollection $timezoneCollection
     */
    public function __construct(
        private CollectionName $collectionName,
        private Parameters $parameters,
        private FootballApiErrorInterface $errors,
        private ResultsCount $resultCount,
        private TimezoneCollection $timezoneCollection
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
     * @return TimezoneCollection
     */
    public function getTimezoneCollection(): TimezoneCollection
    {
        return $this->timezoneCollection;
    }

    /**
     * @return mixed
     */
    public function jsonSerialize(): mixed
    {
        return [];
    }
}