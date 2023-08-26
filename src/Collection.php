<?php

namespace Lcarr\FootballApiSdk;

abstract class Collection
{
    /**
     * @var array
     */
    protected array $collectionData;

    /**
     * @param array $collectionData
     */
    public function __construct(array $collectionData)
    {
        $this->collectionData = $collectionData;
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->collectionData);
    }

    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists(mixed $offset): bool
    {
        return isset($this->collectionData[$offset]);
    }

    /**
     * @param mixed $offset
     * @return mixed
     */
    public function offsetGet(mixed $offset): mixed
    {
        return $this->collectionData[$offset] ?? null;
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->collectionData[$offset] = $value;
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset(mixed $offset): void
    {
        unset($this->collectionData[$offset]);
    }

    /**
     * @return mixed
     */
    abstract public function jsonSerialize(): mixed;
}