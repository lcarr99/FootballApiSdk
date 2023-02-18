<?php

namespace Lcarr\FootballApiSdk\Clients\Methods;

use Lcarr\FootballApiSdk\Api\Exceptions\FootballApiException;
use Lcarr\FootballApiSdk\Clients\FootballCurl;
use Lcarr\FootballApiSdk\Clients\Requests\Headers;
use Lcarr\FootballApiSdk\Clients\Requests\Request;
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

    public function send(Request $request): array
    {
        $headers = $request->getHeaders();

        $curlOptions = [
            CURLOPT_HTTPHEADER => $this->formatHeaders($headers),
            CURLOPT_URL => $request->getUrl(),
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_RETURNTRANSFER => true,
        ];

        $this->footballCurl->setOptions($curlOptions);

        $response = $this->footballCurl->getResponse();

        if ($this->footballCurl->hasError()) {
            throw new FootballApiException(
                $request->getUrl(),
                $this->footballCurl->getResponse(),
                $this->footballCurl->getOption(CURLINFO_RESPONSE_CODE),
                $headers
            );
        }

        return $response;
    }

    private function formatHeaders(Headers $headers): array
    {
        $formattedHeaders = [];

        foreach ($headers as $header => $value) {
            $formattedHeaders[] = $header . ': ' . $value;
        }

        return $formattedHeaders;
    }
}