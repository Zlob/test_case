<?php

namespace Searcher\Results\Line;

interface iLineSearchResult
{
    public function isFound(): bool;

    public function charPosition(): int;
}