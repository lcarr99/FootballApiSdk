<?php

namespace Lcarr\FootballApiSdk\Clients\Methods;

use InvalidArgumentException;
use Lcarr\FootballApiSdk\FootballApiSdkException;

class ClientMethodFactory
{
    public static function createClientMethod(string $methodName): ClientMethod
    {
        if ($methodName === ClientMethods::CURL_METHOD) {
            if (!extension_loaded('curl')) {
                throw new FootballApiSdkException('Please make sure you have the curl extension loaded.');
            }

            return new CurlMethod();
        }

        if ($methodName === ClientMethods::GUZZLE_METHOD) {
            return new GuzzleMethod();
        }

        throw new InvalidArgumentException('Please pass a valid client name, refer to the documentation.');
    }
}