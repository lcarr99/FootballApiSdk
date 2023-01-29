<?php

namespace Lcarr\FootballApiSdk\Clients;

use Lcarr\FootballApiSdk\Clients\Methods\ClientMethodFactory;
use Lcarr\FootballApiSdk\FootballApiSdkException;

class FootballApiClient implements FootballApiClientInterface
{
    private FootballApiClientInterface $client;
    private array $headers;

    public function __construct(array $config)
    {
        if (!isset($config['client-method'])) {
            throw new FootballApiSdkException('Please pass the client method');
        }

        $clientMethod = ClientMethodFactory::createClientMethod($config['client-method']);

        if (!isset($config['api-client'])) {
            throw new FootballApiSdkException(
                'Please make sure api-client is set in config and value is either api-client or api-sports.'
            );
        }

        $this->client = FootballApiClientFactory::createApiClient($config['api-client'], $clientMethod);

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

    public function send(string $method, string $url, array $options = []): array
    {
        $options['headers'] = $this->headers;
        return $this->client->send($method, $url, $options);
    }
}