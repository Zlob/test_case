<?php


namespace Searcher\SearchTypes;

use Searcher\Results\Line\iSearchResult;
use Searcher\Results\Line\LineSearchResult;
use Searcher\Results\Line\NullLineSearchResult;

class SearchByStrpos implements iSearchType
{
    public function search(string $where, string $what): iSearchResult
    {
        $position = strpos($where, $what);
        if ($position !== false) {
            return new LineSearchResult($position);
        } else {
            return new NullLineSearchResult();
        }
    }
}