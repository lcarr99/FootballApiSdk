<?php

namespace Lcarr\FootballApiSdk\Timezones\Api;

use Lcarr\FootballApiSdk\Clients\FootballApiClient;
use Lcarr\FootballApiSdk\Timezones\Models\TimezoneModel;

class TimezoneApi
{
    /**
     * @var string
     */
    private string $url = 'timezone';

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