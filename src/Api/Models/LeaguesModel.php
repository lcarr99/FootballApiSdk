<?php

namespace Lcarr\FootballApiSdk\Api\Models;

use Lcarr\FootballApiSdk\Api\CreatableFromResponse;
use Lcarr\FootballApiSdk\Api\Entities\CollectionName;
use Lcarr\FootballApiSdk\Api\Entities\Collections\LeagueCollection;
use Lcarr\FootballApiSdk\Api\Entities\Errors\FootballApiErrorInterface;
use Lcarr\FootballApiSdk\Api\Entities\Parameter;
use Lcarr\FootballApiSdk\Api\Entities\Parameters;
use Lcarr\FootballApiSdk\Api\Entities\ResultsCount;
use Lcarr\FootballApiSdk\Clients\Response;

class LeaguesModel implements ModelInterface, CreatableFromResponse
{
    /**
     * @param CollectionName $collectionName
     * @param Parameters $parameters
     * @param FootballApiErrorInterface $errors
     * @param ResultsCount $resultsCount
     * @param LeagueCollection $leagueCollection
     */
    public function __construct(
        private CollectionName $collectionName,
        private Parameters $parameters,
        private FootballApiErrorInterface $errors,
        private ResultsCount $resultsCount,
        private LeagueCollection $leagueCollection,
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
    public function getResultsCount(): ResultsCount
    {
        return $this->resultsCount;
    }

    /**
     * @return LeagueCollection
     */
    public function getLeagueCollection(): LeagueCollection
    {
        return $this->leagueCollection;
    }

    /**
     * @param Response $response
     * @return LeaguesModel
     */
    public static function createFromResponse(Response $response): LeaguesModel
    {
        $responseData = $response->getBody();
        $collectionName = new CollectionName($response['get']);
        $parameters = new Parameters($responseData['parameters']);
        $resultsCount = new ResultsCount($responseData['count']);
        $
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        // TODO: Implement jsonSerialize() method.
    }
}