<?php

namespace Lcarr\FootballApiSdk\Clients\Requests;

use ArrayAccess;

class Headers implements ArrayAccess
{
    public function __construct(private array $headers)
    {}

    /**
     * @param string $headerName
     * @return mixed
     */
    public function getHeader(string $headerName): mixed
    {
        return $this->headers[$headerName] ?? null;
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
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
}