<?php

namespace Lcarr\FootballApiSdk\Clients\Requests;

class GetRequest implements Request
{
    private const METHOD = 'GET';

    private string $url;
    private array $options;

    public function __construct(string $url,  array $options)
    {
        $this->url = $url;
        $this->options = $options;
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

    public function getOptions(): array
    {
        return $this->options;
    }
}