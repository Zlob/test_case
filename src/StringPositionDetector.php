<?php

namespace Searcher;

use Searcher\Results\File\FileSearchResult;
use Searcher\Results\File\NullFileSearchResult;
use Searcher\Results\Line\iFileSearchResult;
use Searcher\Results\Result;
use Searcher\SearchTypes\iSearchType;
use Searcher\Sources\iSource;

class StringPositionDetector
{

    /**
     * Источник данных
     *
     * @var iSource
     */
    private $source;

    /**
     * Способ поиска
     *
     * @var iSearchType
     */
    private $searchType;

    /**
     * Реализует поиск первого вхождения строки
     * StringPositionDetector constructor.
     * @param iSource $source - источник данных
     * @param iSearchType $searchType - способ поиска
     */
    public function __construct(iSource $source, iSearchType $searchType)
    {
        $this->source = $source;
        $this->searchType = $searchType;
    }

    /**
     * Поиск вхождения строки в файле
     *
     * @param string $needle
     * @return iFileSearchResult
     */
    public function search(string $needle): iFileSearchResult
    {
        $index = 0;
        $lines = $this->source->getIterator();
        foreach ($lines as $line) {
            $positionInLine = $this->searchType->search($line, $needle);
            if ($positionInLine->isFound()) {
                return new FileSearchResult($index, $positionInLine->charPosition());
            }
            $index++;
        }
        return new NullFileSearchResult();
    }
}