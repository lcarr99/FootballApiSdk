<?php

namespace Lcarr\FootballApiSdk\Clients\Requests;

use ArrayAccess;
use Iterator;

class Headers implements ArrayAccess, Iterator
{
    /**
     * @var int
     */
    private int $key = 0;

    /**
     * @param Header[] $headers
     */
    public function __construct(private array $headers = [])
    {}

    /**
     * @return Header[]
     */
    public function toArray(): array
    {
        return $this->headers;
    }

    /**
     * @param string $name
     * @return Header
     */
    public function ofName(string $name): Header
    {
        $filteredHeaders = array_filter($this->headers, fn ($header) => $header->getName() === $name);
        return $filteredHeaders[array_key_first($filteredHeaders)];
    }

    /**
     * @param Header $header
     */
    public function add(Header $header): void
    {
        $this->headers[] = $header;
    }

    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists(mixed $offset): bool
    {
        return isset($this->headers[$offset]);
    }

    /**
     * @param mixed $offset
     * @return mixed
     */
    public function offsetGet(mixed $offset): mixed
    {
        return $this->headers[$offset];
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->headers[$offset] = $value;
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset(mixed $offset): void
    {
        unset($this->headers[$offset]);
    }

    /**
     * @return Header
     */
    public function current(): Header
    {
        return $this->headers[$this->key];
    }

    /**
     * @return void
     */
    public function next(): void
    {
        $this->key++;
    }

    /**
     * @return int
     */
    public function key(): int
    {
        return $this->key;
    }

    /**
     * @return bool
     */
    public function valid(): bool
    {
        return isset($this->headers[$this->key]);
    }

    /**
     * @return void
     */
    public function rewind(): void
    {
        $this->key = 0;
    }
}