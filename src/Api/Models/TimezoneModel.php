<?php

namespace Lcarr\FootballApiSdk\Api\Models;

use Lcarr\FootballApiSdk\Api\CreatableFromResponse;
use Lcarr\FootballApiSdk\Api\Entities\CollectionName;
use Lcarr\FootballApiSdk\Api\Entities\Collections\TimezoneCollection;
use Lcarr\FootballApiSdk\Api\Entities\Errors\EmptyFootballApiError;
use Lcarr\FootballApiSdk\Api\Entities\Errors\FootballApiError;
use Lcarr\FootballApiSdk\Api\Entities\Errors\FootballApiErrorInterface;
use Lcarr\FootballApiSdk\Api\Entities\Parameters;
use Lcarr\FootballApiSdk\Api\Entities\ResultsCount;
use Lcarr\FootballApiSdk\Api\Entities\Timezones\Timezone;
use Lcarr\FootballApiSdk\Clients\Response;

class TimezoneModel implements ModelInterface, CreatableFromResponse
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
     * @param Response $response
     * @return TimezoneModel
     */
    public static function createFromResponse(Response $response): TimezoneModel
    {
        $responseArray = $response->getBody();
        $collectionName = new CollectionName($responseArray['get']);
        $parameters = new Parameters($responseArray['parameters']);
        $errors = empty($responseArray['errors']) ? new EmptyFootballApiError() : new FootballApiError(
            $responseArray['errors']
        );
        $resultCount = new ResultsCount($responseArray['results']);
        $timezones = new TimezoneCollection(
            array_map(fn (string $timezone) => new Timezone($timezone), $responseArray['response'])
        );

        return new self($collectionName, $parameters, $errors, $resultCount, $timezones);
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