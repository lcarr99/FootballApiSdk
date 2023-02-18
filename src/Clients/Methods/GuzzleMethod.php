<?php

namespace Lcarr\FootballApiSdk\Clients\Methods;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Lcarr\FootballApiSdk\Api\Exceptions\FootballApiException;
use Lcarr\FootballApiSdk\Clients\Requests\Request;

class GuzzleMethod implements ClientMethod
{
    public function __construct(private Client|null $client = null)
    {
        $this->client = $this->client ?? new Client();
    }

    /**
     * @param Request $request
     * @return array
     * @throws FootballApiException
     */
    public function send(Request $request): array
    {
        try {
            $headers = $request->getHeaders();
            $guzzleOptions = ['headers' => $headers->getHeaders()];

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