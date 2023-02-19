<?php

namespace Lcarr\FootballApiSdk\Api\Models\Builders;

use Lcarr\FootballApiSdk\Api\Entities\CollectionName;
use Lcarr\FootballApiSdk\Api\Entities\Collections\Collection;
use Lcarr\FootballApiSdk\Api\Entities\Errors\FootballApiErrorInterface;
use Lcarr\FootballApiSdk\Api\Entities\Parameters;
use Lcarr\FootballApiSdk\Api\Entities\ResultsCount;
use Lcarr\FootballApiSdk\Api\Models\Model;

interface ModelBuilderInterface
{
    public function addCollectionName(CollectionName $collectionName): void;
    public function addParameters(Parameters $parameters): void;
    public function addErrors(FootballApiErrorInterface $errors): void;
    public function addResultCount(ResultsCount $resultsCount): void;
    public function addCollection(Collection $collection): void;
    public function createModel(): Model;
}