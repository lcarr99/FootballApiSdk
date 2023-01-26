<?php

namespace Lcarr\FootballApiSdk\Api\Exceptions;

use Exception;

class FootballApiException extends Exception
{
    private string $url;
    private array $body;
    private int $statusCode;
    private array $headers;

    public function __construct(string $url, array $body, int $statusCode, array $headers)
    {
        $this->url = $url;
        $this->body = $body;
        $this->statusCode = $statusCode;
        $this->headers = $headers;

        parent::__construct(sprintf('There was an error calling %s', $url), 0);
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
        return $this->body;
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
    public function getHeaders(): array
    {
        return $this->headers;
    }
}
