<?php

namespace Lcarr\FootballApiSdk\Clients;

use ArrayObject;
use Lcarr\FootballApiSdk\FootballApiSdkException;

class FootballApiConfig extends ArrayObject
{
    public function __construct($config = [])
    {
        if (!isset($config['api-client'])) {
            throw new FootballApiSdkException(
                'Please make sure api-client is set in config and value is either api-client or api-sports.'
            );
        }

        if (!isset($config['client-method'])) {
            throw new FootballApiSdkException('Please pass the client method');
        }

        parent::__construct($config, $flags = 0, $iteratorClass = "ArrayIterator");
    }

    public static function create(array $config): FootballApiConfig
    {
        return new FootballApiConfig($config);
    }
}