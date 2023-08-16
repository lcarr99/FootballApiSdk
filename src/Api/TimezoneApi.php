<?php

namespace Lcarr\FootballApiSdk\Api;

use Lcarr\FootballApiSdk\Api\Models\TimezoneModel;
use Lcarr\FootballApiSdk\Clients\FootballApiClient;

class TimezoneApi
{
    /**
     * @var string
     */
    private readonly string $url = 'timezone';

    /**
     * @param FootballApiClient $footballApiClient
     */
    public function __construct(private FootballApiClient $footballApiClient)
    {}

    /**
     * @return TimezoneModel
     */
    public function all(): TimezoneModel
    {
        return TimezoneModel::createFromResponse($this->footballApiClient->send('GET', $this->url));
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }
}