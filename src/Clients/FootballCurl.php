<?php

namespace Lcarr\FootballApiSdk\Clients;

class FootballCurl
{
    private $curl;

    public function __construct()
    {
        $this->curl = curl_init();
    }

    public function setOptions(array $options): void
    {
        curl_setopt_array($this->curl, $options);
    }

    public function getResponse(): array
    {
        return json_decode(curl_exec($this->curl), true);
    }

    public function hasError(): bool
    {
        return curl_errno($this->curl) > 0;
    }

    public function getOption(int $curlOption)
    {
        return curl_getinfo($this->curl, $curlOption);
    }

    public function getInfo(): array
    {
        return curl_getinfo($this->curl);
    }

    public function close(): void
    {
        curl_close($this->curl);
    }
}