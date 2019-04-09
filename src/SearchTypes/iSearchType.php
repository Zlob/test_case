<?php

namespace Searcher\SearchTypes;

use Searcher\Results\Line\iSearchResult;

interface iSearchType
{
    public function search(string $where, string $what): iSearchResult;
}