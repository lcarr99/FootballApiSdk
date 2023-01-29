<?php

namespace Lcarr\FootballApiSdk\Clients;

interface FootballApiClientInterface
{
    public function send(string $method, string $url, array $options): array;
}