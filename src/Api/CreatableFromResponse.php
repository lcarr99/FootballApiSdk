<?php

namespace Lcarr\FootballApiSdk\Api;

use Lcarr\FootballApiSdk\Api\Models\ModelInterface;
use Lcarr\FootballApiSdk\Clients\Response;

interface CreatableFromResponse
{
    /**
     * @param Response $response
     * @return ModelInterface
     */
    public static function createFromResponse(Response $response): ModelInterface;
}