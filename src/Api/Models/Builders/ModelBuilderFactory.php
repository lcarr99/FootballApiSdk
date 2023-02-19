<?php

namespace Lcarr\FootballApiSdk\Api\Models\Builders;

use InvalidArgumentException;

class ModelBuilderFactory
{
    public static function createModelBuilder(string $modelName): ModelBuilderInterface
    {
        return match ($modelName) {
            'countries' => new CountriesModelBuilder(),
            'timezone' => new TimezoneModelBuilder(),
            default => throw new InvalidArgumentException('Invalid model name passed'),
        };
    }
}