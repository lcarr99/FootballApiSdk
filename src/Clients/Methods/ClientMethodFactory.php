<?php

namespace Lcarr\FootballApiSdk\Clients\Methods;

use InvalidArgumentException;

class ClientMethodFactory
{
    /**
     * @param string $methodName
     * @return ClientMethod
     */
    public static function createClientMethod(string $methodName): ClientMethod
    {
        return match ($methodName) {
            ClientMethods::CURL_METHOD => new CurlMethod(),
            ClientMethods::GUZZLE_METHOD => new GuzzleMethod(),
            default => throw new InvalidArgumentException(
                'Please pass a valid client name, refer to the documentation.'
            ),
        };
    }
}