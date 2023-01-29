<?php

namespace Lcarr\FootballApiSdk\Clients\Requests;

use InvalidArgumentException;

class RequestFactory
{
    public static function createRequest(string $method, string $url, array $options): Request
    {
        if (strtoupper($method) === 'GET') {
            return new GetRequest($url, $options);
        }

        throw new InvalidArgumentException('Please pass a valid http method.');
    }
}