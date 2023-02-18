<?php

namespace Lcarr\FootballApiSdk\Api\Entities;

class CollectionName
{
    public function __construct(private string $collectionName)
    {}

    /**
     * @return string
     */
    public function getCollectionName(): string
    {
        return $this->collectionName;
    }
}