<?php

namespace Lcarr\FootballApiSdk\Clients\Methods;

use Lcarr\FootballApiSdk\Clients\Requests\Request;

interface ClientMethod
{
    public function send(Request $request): array;
}