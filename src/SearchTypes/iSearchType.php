<?php

namespace Searcher\SearchTypes;

use Searcher\Results\Line\iLineSearchResult;

interface iSearchType
{
    public function search(string $where, string $what): iLineSearchResult;
}