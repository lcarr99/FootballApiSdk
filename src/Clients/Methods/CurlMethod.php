<?php

namespace Lcarr\FootballApiSdk\Clients\Methods;

use Lcarr\FootballApiSdk\Api\Exceptions\FootballApiException;
use Lcarr\FootballApiSdk\Clients\FootballCurl;
use Lcarr\FootballApiSdk\Clients\Requests\Request;

class CurlMethod implements ClientMethod
{
    private FootballCurl $footballCurl;

    public function __construct(FootballCurl $footballCurl = null)
    {
        $this->footballCurl = $footballCurl ?? new FootballCurl();
    }

    public function __destruct()
    {
        $this->footballCurl->close();
    }

    public function send(Request $request): array
    {
        $options = $request->getOptions();

        $curlOptions = [
            CURLOPT_HTTPHEADER => $this->formatHeaders($options['headers'] ?? []),
            CURLOPT_URL => $request->getUrl(),
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_RETURNTRANSFER => true,
        ];

        $this->footballCurl->setOptions($curlOptions);

        if ($this->footballCurl->hasError()) {
            throw new FootballApiException(
                $request->getUrl(),
                $this->footballCurl->getResponse(),
                $this->footballCurl->getOption(CURLINFO_RESPONSE_CODE),
                $options['headers']
            );
        }

        return $this->footballCurl->getResponse();
    }

    private function formatHeaders(array $headers)
    {
        $formattedHeaders = [];

        foreach ($headers as $header => $value) {
            $formattedHeaders[] = $header . ': ' . $value;
        }

        return $formattedHeaders;
    }
}