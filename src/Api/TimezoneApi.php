<?php

namespace Lcarr\FootballApiSdk\Api;

use Lcarr\FootballApiSdk\Clients\Response;
use Lcarr\FootballApiSdk\Api\Entities\CollectionName;
use Lcarr\FootballApiSdk\Api\Entities\Collections\TimezoneCollection;
use Lcarr\FootballApiSdk\Api\Entities\Errors\EmptyFootballApiError;
use Lcarr\FootballApiSdk\Api\Entities\Errors\FootballApiError;
use Lcarr\FootballApiSdk\Api\Entities\Parameters;
use Lcarr\FootballApiSdk\Api\Entities\ResultsCount;
use Lcarr\FootballApiSdk\Api\Entities\Timezones\Timezone;
use Lcarr\FootballApiSdk\Api\Models\Builders\ModelBuilderFactory;
use Lcarr\FootballApiSdk\Api\Models\Builders\ModelCreator;
use Lcarr\FootballApiSdk\Api\Models\Model;
use Lcarr\FootballApiSdk\Api\Models\TimezoneModel;
use Lcarr\FootballApiSdk\Clients\FootballApiClient;

class TimezoneApi
{
    private const URL = 'timezone';

    public function __construct(private FootballApiClient $footballApiClient)
    {}

    /**
     * @return TimezoneModel
     */
    public function all(): TimezoneModel
    {
        return $this->buildModelFromResponseArray($this->footballApiClient->send('GET', self::URL));
    }

    /**
     * @param Response $response
     * @return TimezoneModel
     */
    private function buildModelFromResponseArray(Response $response): TimezoneModel
    {
        $responseArray = $response->getBody();
        $builder = ModelBuilderFactory::createModelBuilder($responseArray['get']);
        $collectionName = new CollectionName($responseArray['get']);
        $parameters = new Parameters($responseArray['parameters']);
        $errors = empty($responseArray['errors']) ? new EmptyFootballApiError() : new FootballApiError(
            $responseArray['errors']
        );
        $resultCount = new ResultsCount($responseArray['results']);
        $timezones = new TimezoneCollection(
            array_map(fn(string $timezone) => new Timezone($timezone), $responseArray['response'])
        );

        $modelCreator = new ModelCreator($builder);
        return $modelCreator->createModel($collectionName, $parameters, $errors, $resultCount, $timezones);
    }
}