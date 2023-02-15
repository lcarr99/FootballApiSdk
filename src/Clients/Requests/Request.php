<?php

namespace Lcarr\FootballApiSdk\Clients\Requests;

interface Request
{
    public function getUrl(): string;
    public function getHeaders(): Headers;
    public function getBody(): array;
}