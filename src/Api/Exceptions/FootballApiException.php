<?php

namespace Lcarr\FootballApiSdk\Api\Exceptions;

use Exception;
use Lcarr\FootballApiSdk\Clients\Requests\Headers;

class FootballApiException extends Exception
{
    private string $url;
    private array $body;
    private int $statusCode;
    private Headers $headers;

    public function __construct(string $url, array $body, int $statusCode, Headers $headers)
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
    public function getHeaders(): Headers
    {
        return $this->headers;
    }
}
