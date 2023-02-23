<?php

namespace Lcarr\FootballApiSdk\Api;

use Lcarr\FootballApiSdk\Api\Entities\CollectionName;
use Lcarr\FootballApiSdk\Api\Entities\Collections\CountryCollection;
use Lcarr\FootballApiSdk\Api\Entities\Countries\Country;
use Lcarr\FootballApiSdk\Api\Entities\Errors\EmptyFootballApiError;
use Lcarr\FootballApiSdk\Api\Entities\Errors\FootballApiError;
use Lcarr\FootballApiSdk\Api\Entities\Parameters;
use Lcarr\FootballApiSdk\Api\Entities\ResultsCount;
use Lcarr\FootballApiSdk\Api\Models\Builders\ModelBuilderFactory;
use Lcarr\FootballApiSdk\Api\Models\Builders\ModelCreator;
use Lcarr\FootballApiSdk\Api\Models\CountriesModel;
use Lcarr\FootballApiSdk\Clients\FootballApiClient;
use Lcarr\FootballApiSdk\Clients\Response;

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

        return $this->buildModelFromResponse($this->footballApiClient->send('GET', $url));
    }

    /**
     * @param string $code
     * @return CountriesModel
     */
    public function ofCode(string $code): CountriesModel
    {
        $url = self::COUNTRIES_URL . '?' . http_build_query(['code' => $code]);

        return $this->buildModelFromResponse($this->footballApiClient->send('GET', $url));
    }

    /**
     * @param string $searchTerm
     * @return CountriesModel
     */
    public function search(string $searchTerm): CountriesModel
    {
        $url = self::COUNTRIES_URL . '?' . http_build_query(['search' => $searchTerm]);
        return $this->buildModelFromResponse($this->footballApiClient->send('GET', $url));
    }

    /**
     * @return CountriesModel
     */
    public function all(): CountriesModel
    {
        return $this->buildModelFromResponse($this->footballApiClient->send('GET', self::COUNTRIES_URL));
    }

    /**
     * @param array $responseArray
     * @return CountriesModel
     */
    private function buildModelFromResponse(Response $response): CountriesModel
    {
        $responseArray = $response->getBody();
        $builder = ModelBuilderFactory::createModelBuilder($responseArray['get']);
        $collectionName = new CollectionName($responseArray['get']);
        $parameters = new Parameters($responseArray['parameters']);
        $errors = empty($responseArray['errors']) ? new EmptyFootballApiError() : new FootballApiError(
            $responseArray['errors']
        );
        $resultCount = new ResultsCount($responseArray['results']);
        $countries = new CountryCollection(
            array_map(fn($countryData) => new Country($countryData), $responseArray['response'])
        );

        $modelCreator = new ModelCreator($builder);
        return $modelCreator->createModel($collectionName, $parameters, $errors, $resultCount, $countries);
    }
}
