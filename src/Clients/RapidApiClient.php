<?php

namespace Lcarr\FootballApiSdk\Clients;

use Lcarr\FootballApiSdk\Clients\Methods\ClientMethod;
use Lcarr\FootballApiSdk\Clients\Requests\RequestFactory;

class RapidApiClient implements FootballApiClientInterface
{
    private const BASE_URL = 'https://api-football-v1.p.rapidapi.com/v3/';

    private ClientMethod $clientMethod;

    public function __construct(ClientMethod $clientMethod)
    {
        $this->clientMethod = $clientMethod;
    }

    public function send(string $method, string $url, array $options): array
    {
        return $this->clientMethod->send(RequestFactory::createRequest($method, self::BASE_URL . $url, $options));
    }
}