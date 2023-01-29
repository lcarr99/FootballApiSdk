<?php

namespace Lcarr\FootballApiSdk\Clients\Requests;

interface Request
{
    public function getUrl(): string;
    public function getOptions(): array;
    public function getBody(): array;
}