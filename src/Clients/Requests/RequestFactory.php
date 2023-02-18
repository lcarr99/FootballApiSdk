<?php

namespace Lcarr\FootballApiSdk\Clients\Requests;

use InvalidArgumentException;

class RequestFactory
{
    /**
     * @param string $method
     * @param string $url
     * @param Headers $headers
     * @return Request
     */
    public static function createRequest(string $method, string $url, Headers $headers): Request
    {
        if (strtoupper($method) === RequestMethods::GET) {
            return new GetRequest($url, $headers);
        }

        throw new InvalidArgumentException('Please pass a valid http method.');
    }
}