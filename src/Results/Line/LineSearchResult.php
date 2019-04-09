<?php

namespace Searcher\Results\Line;

class LineSearchResult implements iSearchResult
{
    private $position;

    public function __construct($position)
    {
        $this->position = $position;
    }

    public function isFound(): bool
    {
        return $this->position !== null;
    }

    public function position(): int
    {
        return $this->position;
    }
}