<?php

namespace Lcarr\FootballApiSDK\Api\Entities\Leagues\League;

class League
{
    /**
     * @param int $id
     * @param string $name
     * @param string $type
     * @param string $logo
     */
    public function __construct(
        private int $id,
        private string $name,
        private string $type,
        private string $logo,
    )
    {}

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getLogo(): string
    {
        return $this->logo;
    }
}