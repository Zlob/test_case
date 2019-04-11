<?php

namespace Searcher\Results\Line;

class NullLineLineSearchResult implements iLineSearchResult
{
    public function isFound(): bool
    {
        return false;
    }

    public function charPosition(): int
    {
        return 0;
    }
}