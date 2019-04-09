<?php

namespace Searcher\Results;

class Result
{
    /**
     * @var int
     */
    private $number;
    /**
     * @var int
     */
    private $position;

    public function __construct(int $number, int $position)
    {
        $this->number = $number;
        $this->position = $position;
    }

    /**
     * @return int
     */
    public function getPosition(): int
    {
        return $this->position;
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

}