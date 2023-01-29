<?php

namespace Lcarr\FootballApiSdk\Clients\Methods;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Lcarr\FootballApiSdk\Api\Exceptions\FootballApiException;
use Lcarr\FootballApiSdk\Clients\Requests\Request;

class GuzzleMethod implements ClientMethod
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function send(Request $request): array
    {
        try {
            $options = $request->getOptions();
            $guzzleOptions = ['headers' => $options['headers']];

            $response = $this->client->request($request->getMethod(), $request->getUrl(), $guzzleOptions);

            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $guzzleException) {
            throw new FootballApiException(
                $request->getUrl(),
                $guzzleException->getResponse()->getBody()->getContents(),
                $guzzleException->getResponse()->getStatusCode(),
                $guzzleOptions['headers']
            );
        }
    }
}