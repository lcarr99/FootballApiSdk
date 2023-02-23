<?php

namespace Lcarr\FootballApiSdk\Clients\Methods;

use Lcarr\FootballApiSdk\Api\Exceptions\FootballApiException;
use Lcarr\FootballApiSdk\Clients\FootballCurl;
use Lcarr\FootballApiSdk\Clients\Requests\Header;
use Lcarr\FootballApiSdk\Clients\Requests\Headers;
use Lcarr\FootballApiSdk\Clients\Requests\Request;
use Lcarr\FootballApiSdk\Clients\Response;
use Lcarr\FootballApiSdk\FootballApiSdkException;

class CurlMethod implements ClientMethod
{
    public function __construct(private FootballCurl|null $footballCurl = null)
    {
        extension_loaded('curl') ?? throw new FootballApiSdkException(
            'Please make sure you have the curl extension loaded in your php.ini'
        );

        $this->footballCurl = $this->footballCurl ?? new FootballCurl();
    }

    public function __destruct()
    {
        $this->footballCurl->close();
    }

    public function send(Request $request): Response
    {
        $headers = $request->getHeaders();

        $curlOptions = [
            CURLOPT_HTTPHEADER => $this->formatHeaders($headers),
            CURLOPT_URL => $request->getUrl(),
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => true,
        ];

        $this->footballCurl->setOptions($curlOptions);

        $response = $this->footballCurl->getResponse();

        if ($this->footballCurl->hasError() || $response->getStatusCode() >= 400) {
            throw new FootballApiException(
                $response->getUrl(),
                $response->getBody(),
                $response->getStatusCode(),
                $response->getHeaders()
            );
        }

        return $response;
    }

    private function formatHeaders(Headers $headers): array
    {
        var_dump($headers);
        return array_map(fn(Header $header) => $header->getName() . ': ' . $header->getValue(), $headers->toArray());
    }
}