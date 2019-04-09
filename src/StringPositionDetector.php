<?php

namespace Searcher;

use Searcher\Results\Result;
use Searcher\SearchTypes\iSearchType;

class StringPositionDetector
{

    /**
     * @var string
     */
    private $filename;
    /**
     * @var iSearchType
     */
    private $searchType;

    public function __construct(string $filename, iSearchType $searchType)
    {
        $this->filename = $filename;
        $this->searchType = $searchType;
    }

    public function search(string $needle)
    {
        $lineNumber = 0;
        $handle = fopen($this->filename, 'r');
        if ($handle) {
            while(!feof($handle))  {
                $line = fgets($handle);
                $positionInLine = $this->searchType->search($line, $needle);
                if ($positionInLine->isFound() !== false) {
                    fclose($handle);
                    return new Result($lineNumber, $positionInLine->position());
                }
                $lineNumber++;
            }
        } else {
            //todo throw exception
        }
    }
}