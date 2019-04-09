<?php

namespace Searcher\Results\Line;

class NullLineSearchResult implements iSearchResult
{
    public function isFound(): bool
    {
        return false;
    }

    public function position(): int
    {
        return 0;
    }
}