<?php

namespace Lcarr\FootballApiSdk\Clients\Requests;

use ArrayObject;
use Lcarr\FootballApiSdk\FootballApiSdkException;

class Headers extends ArrayObject
{
    public function getHeader(string $headerName): mixed
    {
        if (!$this->offsetExists($headerName)) {
            throw new FootballApiSdkException(sprintf('Header %s not found', $headerName));
        }

        return $this->offsetGet($headerName);
    }

    public function getHeaders(): array
    {
        $returnedHeaders = [];

        foreach ($this as $headerName => $headerValue) {
            $returnedHeaders[$headerName] = $headerValue;
        }

        return $returnedHeaders;
    }
}