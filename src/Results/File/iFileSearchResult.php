<?php

namespace Searcher\Results\Line;

interface iFileSearchResult
{
    /**
     * @return bool
     */
    public function isFound(): bool;

    /**
     * @return int
     */
    public function charPosition(): int;

    /**
     * @return int
     */
    public function lineNumber(): int;

}