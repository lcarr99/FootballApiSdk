<?php

namespace Lcarr\FootballApiSdk\Clients;

use Lcarr\FootballApiSdk\Clients\Methods\ClientMethod;
use Lcarr\FootballApiSdk\Clients\Requests\Headers;
use Lcarr\FootballApiSdk\Clients\Requests\RequestFactory;

class ApiSportsClient implements FootballApiClientInterface
{
    private const BASE_URL = 'https://v3.football.api-sports.io/';

    public function __construct(private ClientMethod $clientMethod, private Headers $headers)
    {}

    /**
     * @param string $method
     * @param string $url
     * @return array
     */
    public function send(string $method, string $url): Response
    {
        return $this->clientMethod->send(RequestFactory::createRequest($method, self::BASE_URL . $url, $this->headers));
    }
}