<?php

namespace Lcarr\FootballApiSdk\Clients;

use Lcarr\FootballApiSdk\FootballApiSdkException;
use Psr\Http\Message\ResponseInterface;

class FootballApiClient implements FootballApiClientInterface
{
    private FootballApiClientInterface $client;
    private array $headers;

    public function __construct(array $config)
    {
        if (!isset($config['api-client'])) {
            throw new FootballApiSdkException(
                'Please make sure api-client is set in config and value is either api-client or api-sports.'
            );
        }

        $this->client = FootballApiClientFactory::createApiClient($config['api-client']);

        if ($this->client instanceof RapidApiClient) {
            if (!isset($config['rapid-api-host'])) {
                throw new FootballApiSdkException('Please make sure the rapid-api-host is set in the config.');
            }

            if (!isset($config['rapid-api-key'])) {
                throw new FootballApiSdkException('Please make sure the rapid-api-key is set in the config.');
            }

            $this->headers = [
                'X-RapidAPI-Key' => $config['rapid-api-key'],
                'X-RapidAPI-Host' => $config['rapid-api-host'],
            ];
        }

        if ($this->client instanceof ApiSportsClient) {
            if (!isset($config['api-sports-key'])) {
                throw new FootballApiSdkException('Please make sure api-sports-key is set in the config.');
            }

            $this->headers = [
                'x-apisports-key' => $config['api-sports-key'],
            ];
        }
    }

    public function send(string $url, array $options = []): ResponseInterface
    {
        $options['headers'] = $this->headers;

        return $this->client->send($url, $options);
    }
}