<?php

namespace Lcarr\FootballApiSdk\Clients\Requests;

class GetRequest implements Request
{
    private const METHOD = 'GET';

    private string $url;
    private Headers $headers;

    public function __construct(string $url, Headers $headers)
    {
        $this->url = $url;
        $this->headers = $headers;
    }

    public function getMethod(): string
    {
        return self::METHOD;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getBody(): array
    {
        return [];
    }

    public function getHeaders(): Headers
    {
        return $this->headers;
    }
}