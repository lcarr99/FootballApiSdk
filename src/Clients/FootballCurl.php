<?php

namespace Lcarr\FootballApiSdk\Clients;

use CurlHandle;

class FootballCurl
{
    /**
     * @var CurlHandle
     */
    private CurlHandle $curl;

    public function __construct()
    {
        $this->curl = curl_init();
    }

    /**
     * @param array $options
     */
    public function setOptions(array $options): void
    {
        curl_setopt_array($this->curl, $options);
    }

    /**
     * @return array
     */
    public function getResponse(): array
    {
        return json_decode(curl_exec($this->curl), true);
    }

    /**
     * @return bool
     */
    public function hasError(): bool
    {
        return curl_errno($this->curl) > 0;
    }

    /**
     * @param int $curlOption
     * @return mixed
     */
    public function getOption(int $curlOption)
    {
        return curl_getinfo($this->curl, $curlOption);
    }

    /**
     * @return array
     */
    public function getInfo(): array
    {
        return curl_getinfo($this->curl);
    }

    /**
     * @return void
     */
    public function close(): void
    {
        curl_close($this->curl);
    }
}