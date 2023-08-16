<?php

namespace Lcarr\FootballApiSdk\Api;

use Lcarr\FootballApiSdk\Api\Models\LeaguesModel;
use Lcarr\FootballApiSdk\Clients\FootballApiClient;

class LeaguesApi
{
    /**
     * @var string
     */
    private readonly string $url = 'leagues';

    /**
     * @param FootballApiClient $footballApiClient
     */
    public function __construct(private FootballApiClient $footballApiClient)
    {}

    /**
     * @param int $id
     * @return LeaguesModel
     */
    public function ofId(int $id): LeaguesModel
    {
        $response = $this->footballApiClient->send('get', $this->url);
        return LeaguesModel::createFromResponse($response);
    }

    /**
     * @return string
     */
    final public function getUrl(): string
    {
        return $this->url;
    }
}