<?php

namespace Searcher\Results\File;

use Searcher\Results\Line\iFileSearchResult;

class FileSearchResult implements iFileSearchResult
{
    /**
     * @var int
     */
    private $number;
    /**
     * @var int
     */
    private $position;

    /**
     * FileSearchResult constructor.
     * @param int $number
     * @param int $position
     */
    public function __construct(int $number, int $position)
    {
        $this->number = $number;
        $this->position = $position;
    }

    /**
     * @return int
     */
    public function charPosition(): int
    {
        return $this->position;
    }

    /**
     * @return int
     */
    public function lineNumber(): int
    {
        return $this->number;
    }

    /**
     * @return bool
     */
    public function isFound(): bool
    {
        return true;
    }
}