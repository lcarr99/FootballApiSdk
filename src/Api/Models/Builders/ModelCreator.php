<?php

namespace Lcarr\FootballApiSdk\Api\Models\Builders;

use Lcarr\FootballApiSdk\Api\Entities\CollectionName;
use Lcarr\FootballApiSdk\Api\Entities\Collections\Collection;
use Lcarr\FootballApiSdk\Api\Entities\Errors\FootballApiErrorInterface;
use Lcarr\FootballApiSdk\Api\Entities\Parameters;
use Lcarr\FootballApiSdk\Api\Entities\ResultsCount;
use Lcarr\FootballApiSdk\Api\Models\Model;

class ModelCreator
{
    public function __construct(private ModelBuilderInterface $modelBuilder)
    {}

    /**
     * @param CollectionName $collectionName
     * @param Parameters $parameters
     * @param FootballApiErrorInterface $errors
     * @param ResultsCount $resultsCount
     * @param Collection $collection
     * @return Model
     */
    public function createModel(
        CollectionName $collectionName,
        Parameters $parameters,
        FootballApiErrorInterface $errors,
        ResultsCount $resultsCount,
        Collection $collection
    ): Model
    {
        $this->modelBuilder->addCollectionName($collectionName);
        $this->modelBuilder->addParameters($parameters);
        $this->modelBuilder->addErrors($errors);
        $this->modelBuilder->addResultCount($resultsCount);
        $this->modelBuilder->addCollection($collection);

        return $this->modelBuilder->createModel();
    }
}