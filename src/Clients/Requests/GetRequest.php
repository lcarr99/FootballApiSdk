<?php

namespace Lcarr\FootballApiSdk\Clients\Requests;

class GetRequest implements Request
{
    private const METHOD = 'GET';

    public function __construct(private string $url, private Headers $headers)
    {}

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return self::METHOD;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return array
     */
    public function getBody(): array
    {
        return [];
    }

    /**
     * @return Headers
     */
    public function getHeaders(): Headers
    {
        return $this->headers;
    }
}