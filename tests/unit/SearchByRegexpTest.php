<?php


use PHPUnit\Framework\TestCase;

class SearchByRegexpTest extends TestCase
{
    /**
     * @test
     */
    public function can_search_existent_needle()
    {
        $searchType = new \Searcher\SearchByRegexp();
        $line = 'Lorem ipsum dolor sit amet, consectetur 2019 adipiscing elit,';
        $result = $searchType->search($line, '/ipsum/');
        $this->assertEquals(true, $result->isFound());
        $this->assertEquals(6, $result->position());

        $result = $searchType->search($line, '/\d+/');
        $this->assertEquals(true, $result->isFound());
        $this->assertEquals(40, $result->position());
    }

    /**
     * @test
     */
    public function cant_search_nonexistent_needle()
    {
        $searchType = new \Searcher\SearchByRegexp();
        $line = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,';
        $result = $searchType->search($line, '/sometext/');
        $this->assertEquals(false, $result->isFound());
        $this->assertEquals(0, $result->position());
    }


    public function cant_work_with_wrong_regexp()
    {
        $searchType = new \Searcher\SearchByRegexp();
        $line = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,';

        $this->expectException(\Searcher\Exceptions\WrongNeedle::class);
        $result = $searchType->search($line, 'ipsum');
    }

}