<?php

namespace Searcher\Results\Line;

interface iSearchResult
{
    public function isFound(): bool;

    public function position(): int;
}