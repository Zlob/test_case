<?php

namespace Searcher;

use Searcher\Exceptions\WrongNeedle;
use Searcher\Results\Line\iSearchResult;
use Searcher\Results\Line\LineSearchResult;
use Searcher\Results\Line\NullLineSearchResult;
use Searcher\SearchTypes\iSearchType;

class SearchByRegexp implements iSearchType
{
    const DELIMITER = '/';

    public function search(string $where, string $what): iSearchResult
    {
        $matches = [];
        if (!$this->correctRegexp($what)) {
            throw new WrongNeedle("what must be valid regexp, $what given");
        }
        if (preg_match($what, $where, $matches, PREG_OFFSET_CAPTURE) === 1) {
            return new LineSearchResult($matches[0][1]);
        } else {
            return new NullLineSearchResult();
        };
    }

    private function correctRegexp($regexp)
    {
        return preg_match('\/.+\/', $regexp);
    }
}