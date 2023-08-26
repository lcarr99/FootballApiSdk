<?php

namespace Lcarr\FootballApiSdk;

use Lcarr\FootballApiSdk\Clients\Response;

interface CreatableFromResponse
{
    /**
     * @param Response $response
     * @return ModelInterface
     */
    public static function createFromResponse(Response $response): ModelInterface;
}