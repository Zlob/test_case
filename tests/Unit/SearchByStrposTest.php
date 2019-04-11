<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class SearcherTest extends TestCase
{
    /**
     * @test
     */
    public function return_result_if_needle_exist()
    {
        $searchType = new \Searcher\SearchTypes\SearchByStrpos();
        $line = 'Lorem ipsum dolor sit amet, consectetur 2019 adipiscing elit,';
        $result = $searchType->search($line, 'Lorem');
        $this->assertEquals(true, $result->isFound());
        $this->assertEquals(0, $result->charPosition());

        $result = $searchType->search($line, 'amet');
        $this->assertEquals(true, $result->isFound());
        $this->assertEquals(22, $result->charPosition());
    }

    /**
     * @test
     */
    public function return_null_object_if_needle_does_not_exist()
    {
        $searchType = new \Searcher\SearchTypes\SearchByStrpos();
        $line = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,';
        $result = $searchType->search($line, 'sometext');
        $this->assertEquals(false, $result->isFound());
        $this->assertEquals(0, $result->charPosition());
    }
}