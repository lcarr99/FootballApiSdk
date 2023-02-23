<?php

namespace Lcarr\FootballApiSdk\Clients\Methods;

use Lcarr\FootballApiSdk\Clients\Requests\Request;
use Lcarr\FootballApiSdk\Clients\Response;

interface ClientMethod
{
    public function send(Request $request): Response;
}