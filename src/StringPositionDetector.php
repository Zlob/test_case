<?php

namespace Searcher;

use Searcher\Results\Result;
use Searcher\SearchTypes\iSearchType;
use Searcher\Sources\iSource;

class StringPositionDetector
{

    /**
     * @var iSource
     */
    private $source;
    /**
     * @var iSearchType
     */
    private $searchType;

    public function __construct(iSource $source, iSearchType $searchType)
    {
        $this->source = $source;
        $this->searchType = $searchType;
    }

    public function search(string $needle)
    {
        $index = 0;
        $lines = $this->source->getIterator();
        foreach ($lines as $line) {
            $positionInLine = $this->searchType->search($line, $needle);
            if ($positionInLine->isFound()) {
                return new Result($index, $positionInLine->position());
            }
            $index++;
        }
    }
}