<?php

namespace Lcarr\FootballApiSdk\Clients;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Lcarr\FootballApiSdk\Api\Exceptions\FootballApiException;
use Psr\Http\Message\ResponseInterface;

class ApiSportsClient implements FootballApiClientInterface
{
    private const BASE_URL = 'https://v3.football.api-sports.io/';
    private Client $client;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => self::BASE_URL]);
    }

    public function send(string $url, array $options): ResponseInterface
    {
        try {
            return $this->client->request('GET', $url, $options);
        } catch (GuzzleException $guzzleException) {
            throw new FootballApiException(
                $guzzleException->getRequest()->getUri(),
                $guzzleException->getResponse()->getBody(),
                $guzzleException->getResponse()->getStatusCode(),
                $options
            );
        }
    }
}