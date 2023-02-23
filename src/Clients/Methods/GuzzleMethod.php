<?php

namespace Lcarr\FootballApiSdk\Clients\Methods;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Lcarr\FootballApiSdk\Api\Exceptions\FootballApiException;
use Lcarr\FootballApiSdk\Clients\Requests\Header;
use Lcarr\FootballApiSdk\Clients\Requests\Request;
use Lcarr\FootballApiSdk\Clients\Response;
use Lcarr\FootballApiSdk\Clients\Requests\Headers;

class GuzzleMethod implements ClientMethod
{
    public function __construct(private Client|null $client = null)
    {
        $this->client = $this->client ?? new Client();
    }

    /**
     * @param Request $request
     * @return Response
     * @throws FootballApiException
     */
    public function send(Request $request): Response
    {
        try {
            $guzzleOptions['headers'] = [];

            foreach ($request->getHeaders() as $header) {
                $guzzleOptions['headers'][$header->getName()] = $header->getValue();
            }

            $response = $this->client->request($request->getMethod(), $request->getUrl(), $guzzleOptions);
            $headersArray = $response->getHeaders();

            return new Response(
                $request->getUrl(),
                $response->getStatusCode(),
                json_decode($response->getBody()->getContents(), true),
                new Headers(
                    array_map(
                        fn(string $headerName) => new Header(
                            $headerName,
                            is_array($headersArray[$headerName]) ? json_encode(
                                $headersArray[$headerName]
                            ) : $headersArray[$headerName]
                        ),
                        array_keys($headersArray)
                    )
                )
            );
        } catch (GuzzleException $guzzleException) {
            $headersArray = $guzzleException->getResponse()->getHeaders();
            var_dump($headersArray);
            throw new FootballApiException(
                $request->getUrl(),
                json_decode($guzzleException->getResponse()->getBody()->getContents(), true),
                $guzzleException->getResponse()->getStatusCode(),
                new Headers(
                    array_map(
                        fn(string $headerName) => new Header(
                            $headerName,
                            is_array($headersArray[$headerName]) ? json_encode(
                                $headersArray[$headerName]
                            ) : $headersArray[$headerName]
                        ),
                        array_keys($headersArray)
                    )
                )
            );
        }
    }
}