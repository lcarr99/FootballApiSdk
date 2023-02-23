<?php

namespace Lcarr\FootballApiSdk\Clients;

use CurlHandle;
use Lcarr\FootballApiSdk\Clients\Requests\Header;
use Lcarr\FootballApiSdk\Clients\Requests\Headers;

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
     * @return Response
     */
    public function getResponse(): Response
    {
        $responseString = curl_exec($this->curl);

        return new Response(
            $this->getOption(CURLINFO_EFFECTIVE_URL),
            $this->getOption(CURLINFO_HTTP_CODE),
            json_decode(substr($responseString, $this->getOption(CURLINFO_HEADER_SIZE)), true),
            $this->parseHeaders($responseString)
        );
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
     * @param string $responseString
     * @return Headers
     */
    private function parseHeaders(string $responseString): Headers
    {
        $headerSize = $this->getOption(CURLINFO_HEADER_SIZE);
        $headersArray = array_filter(explode("\n", substr($responseString, 0, $headerSize)));
        $headers = new Headers();

        foreach ($headersArray as $header) {
            if (!strpos($header, ': ')) {
                continue;
            }

            $explodedHeader = explode(': ', trim($header));

            list($name, $value) = $explodedHeader;

            $headers->add(new Header($name, $value));
        }

        return $headers;
    }

    /**
     * @return void
     */
    public function close(): void
    {
        curl_close($this->curl);
    }
}