<?php

namespace Lcarr\FootballApiSdk\Api\Exceptions;

use Exception;
use Lcarr\FootballApiSdk\Clients\Requests\Headers;

class FootballApiException extends Exception
{
    public function __construct(
        private string $url,
        private array $body,
        private int $statusCode,
        private Headers $headers
    ) {
        parent::__construct(sprintf('There was an error calling %s', $url));
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
     * @return Headers
     */
    public function getHeaders(): Headers
    {
        return $this->headers;
    }
}
