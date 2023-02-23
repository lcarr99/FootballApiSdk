<?php

namespace Lcarr\FootballApiSdk\Clients;

use Lcarr\FootballApiSdk\Clients\Requests\Headers;

class Response
{
    public function __construct(
        private string $url,
        private int $statusCode,
        private array $body,
        private Headers $headers
    )
    {}

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @return array
     */
    public function getBody(): array
    {
        return $this->body;
    }

    /**
     * @return Headers
     */
    public function getHeaders(): Headers
    {
        return $this->headers;
    }
}