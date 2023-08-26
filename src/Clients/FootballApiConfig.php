<?php

namespace Lcarr\FootballApiSdk\Clients;

use ArrayAccess;
use Lcarr\FootballApiSdk\Clients\Exceptions\FootballApiSdkException;

class FootballApiConfig implements ArrayAccess
{
    public function __construct(private array $config = [])
    {
        $this->config['api-client'] ?? throw new FootballApiSdkException(
            'Please make sure api-client is set in config and value is either api-client or api-sports.'
        );
        $this->config['client-method'] ?? throw new FootballApiSdkException('Please pass the client method');
    }

    /**
     * @param array $config
     * @return static
     * @throws FootballApiSdkException
     */
    public static function create(array $config): self
    {
        return new self($config);
    }

    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists(mixed $offset): bool
    {
        return isset($this->config[$offset]);
    }

    /**
     * @param mixed $offset
     * @return mixed
     */
    public function offsetGet(mixed $offset): mixed
    {
        return $this->config[$offset];
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->config[$offset] = $value;
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset(mixed $offset): void
    {
        unset($this->config[$offset]);
    }
}