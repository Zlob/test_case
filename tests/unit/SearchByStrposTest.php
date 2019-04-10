<?php


use PHPUnit\Framework\TestCase;

class SearcherTest extends TestCase
{
    /**
     * @test
     */
    public function can_search_existent_needle()
    {
        $searchType = new \Searcher\SearchTypes\SearchByStrpos();
        $line = 'Lorem ipsum dolor sit amet, consectetur 2019 adipiscing elit,';
        $result = $searchType->search($line, 'Lorem');
        $this->assertEquals(true, $result->isFound());
        $this->assertEquals(0, $result->position());

        $result = $searchType->search($line, 'amet');
        $this->assertEquals(true, $result->isFound());
        $this->assertEquals(22, $result->position());
    }

    /**
     * @test
     */
    public function cant_search_nonexistent_needle()
    {
        $searchType = new \Searcher\SearchTypes\SearchByStrpos();
        $line = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,';
        $result = $searchType->search($line, 'sometext');
        $this->assertEquals(false, $result->isFound());
        $this->assertEquals(0, $result->position());
    }
}