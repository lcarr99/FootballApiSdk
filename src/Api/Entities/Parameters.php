<?php

namespace Lcarr\FootballApiSdk\Api\Entities;

use Countable;
use JsonSerializable;

class Parameters implements Countable, JsonSerializable
{
    /**
     * @var Parameter[]
     */
    private array $parameters = [];

    public function __construct(array $parameters)
    {
        foreach ($parameters as $name => $value) {
            $this->parameters[] = new Parameter($name, $value);
        }
    }

    /**
     * @param string $name
     * @return Parameter|null
     */
    public function ofName(string $name): ?Parameter
    {
        $filteredArray = array_filter($this->parameters, fn(Parameter $parameter) => $parameter->getName() === $name);
        return array_shift($filteredArray);
    }

    /**
     * @return Parameter[]
     */
    public function all(): array
    {
        return $this->parameters;
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->parameters);
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return array_map(fn (Parameter $parameter) => [
                'name' => $parameter->getName(),
                'value' => $parameter->getValue(),
            ], $this->parameters);
    }
}