<?php

namespace Lcarr\FootballApiSdk\Clients;

use Psr\Http\Message\ResponseInterface;

interface FootballApiClientInterface
{
    public function send(string $url, array $options): ResponseInterface;
}