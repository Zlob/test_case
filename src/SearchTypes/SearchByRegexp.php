<?php

namespace Searcher;

use Searcher\Exceptions\WrongNeedle;
use Searcher\Results\Line\iLineSearchResult;
use Searcher\Results\Line\LineSearchResult;
use Searcher\Results\Line\NullLineLineSearchResult;
use Searcher\SearchTypes\iSearchType;

class SearchByRegexp implements iSearchType
{
    /**
     * Поиск вхождения строки по регулярному выражению
     *
     * @param string $where
     * @param string $what
     * @return iLineSearchResult
     */
    public function search(string $where, string $what): iLineSearchResult
    {
        $matches = [];
        if (!$this->correctRegexp($what)) {
            throw new WrongNeedle("what must be valid regexp, $what given");
        }
        if (preg_match($what, $where, $matches, PREG_OFFSET_CAPTURE) === 1) {
            return new LineSearchResult($matches[0][1]);
        } else {
            return new NullLineLineSearchResult();
        }
    }

    /**
     * Проверка переданного регулярного выражения на корректность
     *
     * @param $regexp
     * @return false|int
     */
    private function correctRegexp($regexp)
    {
        return preg_match('/\/.+\//', $regexp);
    }
}