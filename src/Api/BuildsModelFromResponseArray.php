<?php

namespace Lcarr\FootballApiSdk\Api;

use Lcarr\FootballApiSdk\Api\Models\Model;

interface BuildsModelFromResponseArray
{
    public function buildModelFromResponseArray(array $responseArray): Model;
}