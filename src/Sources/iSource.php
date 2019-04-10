<?php


namespace Searcher\Sources;


use Iterator;

interface iSource
{
    public function getIterator() : Iterator;
}