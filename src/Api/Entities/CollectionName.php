<?php

namespace Lcarr\FootballApiSdk\Api\Entities;

class CollectionName
{
    private string $collectionName;

    public function __construct(string $collectionName)
    {
        $this->collectionName = $collectionName;
    }

    public function getCollectionName(): string
    {
        return $this->collectionName;
    }
}