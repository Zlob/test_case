<?php

namespace Searcher\Results\Line;

class LineSearchResult implements iLineSearchResult
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

    public function charPosition(): int
    {
        return $this->position;
    }
}