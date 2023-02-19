<?php

namespace Lcarr\FootballApiSdk\Api\Models\Builders;

use Lcarr\FootballApiSdk\Api\Entities\CollectionName;
use Lcarr\FootballApiSdk\Api\Entities\Collections\Collection;
use Lcarr\FootballApiSdk\Api\Entities\Collections\TimezoneCollection;
use Lcarr\FootballApiSdk\Api\Entities\Errors\FootballApiErrorInterface;
use Lcarr\FootballApiSdk\Api\Entities\Parameters;
use Lcarr\FootballApiSdk\Api\Entities\ResultsCount;
use Lcarr\FootballApiSdk\Api\Models\Model;
use Lcarr\FootballApiSdk\Api\Models\TimezoneModel;

class TimezoneModelBuilder implements ModelBuilderInterface
{
    private CollectionName $collectionName;
    private Parameters $parameters;
    private FootballApiErrorInterface $errors;
    private ResultsCount $resultsCount;
    private Collection $collection;

    public function addCollectionName(CollectionName $collectionName): void
    {
        $this->collectionName = $collectionName;
    }

    public function addParameters(Parameters $parameters): void
    {
        $this->parameters = $parameters;
    }

    public function addErrors(FootballApiErrorInterface $errors): void
    {
        $this->errors = $errors;
    }

    public function addResultCount(ResultsCount $resultsCount): void
    {
        $this->resultsCount = $resultsCount;
    }

    public function addCollection(Collection $collection): void
    {
        $this->collection = $collection;
    }

    public function createModel(): Model
    {
        return new TimezoneModel(
            $this->collectionName,
            $this->parameters,
            $this->errors,
            $this->resultsCount,
            $this->collection
        );
    }
}