<?php


namespace Searcher\SearchTypes;

use Searcher\Results\Line\iLineSearchResult;
use Searcher\Results\Line\LineSearchResult;
use Searcher\Results\Line\NullLineLineSearchResult;

class SearchByStrpos implements iSearchType
{
    /**
     * Поиск вхождения строки
     *
     * @param string $where
     * @param string $what
     * @return iLineSearchResult
     */
    public function search(string $where, string $what): iLineSearchResult
    {
        $position = strpos($where, $what);
        if ($position !== false) {
            return new LineSearchResult($position);
        } else {
            return new NullLineLineSearchResult();
        }
    }
}