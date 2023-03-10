<?php

namespace Lcarr\FootballApiSdk\Clients\Methods;

use InvalidArgumentException;
use Lcarr\FootballApiSdk\FootballApiSdkException;

class ClientMethodFactory
{
    /**
     * @param string $methodName
     * @return ClientMethod
     * @throws FootballApiSdkException
     */
    public static function createClientMethod(string $methodName): ClientMethod
    {
        if ($methodName === ClientMethods::CURL_METHOD) {
            extension_loaded('curl') ?? throw new FootballApiSdkException(
                'Please make sure you have the curl extension loaded in your php.ini'
            );

            return new CurlMethod();
        }

        if ($methodName === ClientMethods::GUZZLE_METHOD) {
            return new GuzzleMethod();
        }

        throw new InvalidArgumentException('Please pass a valid client name, refer to the documentation.');
    }
}