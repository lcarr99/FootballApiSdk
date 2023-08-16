<?php

namespace Lcarr\FootballApiSdk\Api\Entities\Collections;

abstract class Collection
{
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