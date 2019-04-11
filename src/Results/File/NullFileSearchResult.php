<?php

namespace Searcher\Results\File;

use Searcher\Results\Line\iFileSearchResult;

class NullFileSearchResult implements iFileSearchResult
{
    /**
     * @return int
     */
    public function charPosition(): int
    {
        return 0;
    }

    /**
     * @return int
     */
    public function lineNumber(): int
    {
        return 0;
    }

    /**
     * @return bool
     */
    public function isFound(): bool
    {
        return false;
    }
}