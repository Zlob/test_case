<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class SearchByRegexpTest extends TestCase
{
    /**
     * @test
     */
    public function return_result_if_needle_exist()
    {
        $searchType = new \Searcher\SearchByRegexp();
        $line = 'Lorem ipsum dolor sit amet, consectetur 2019 adipiscing elit,';
        $result = $searchType->search($line, '/ipsum/');
        $this->assertEquals(true, $result->isFound());
        $this->assertEquals(6, $result->charPosition());

        $result = $searchType->search($line, '/\d+/');
        $this->assertEquals(true, $result->isFound());
        $this->assertEquals(40, $result->charPosition());
    }

    /**
     * @test
     */
    public function return_null_object_if_needle_does_not_exist()
    {
        $searchType = new \Searcher\SearchByRegexp();
        $line = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,';
        $result = $searchType->search($line, '/sometext/');
        $this->assertEquals(false, $result->isFound());
        $this->assertEquals(0, $result->charPosition());
    }


    public function throw_exception_if_regexp_is_invalid()
    {
        $searchType = new \Searcher\SearchByRegexp();
        $line = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,';

        $this->expectException(\Searcher\Exceptions\WrongNeedle::class);
        $result = $searchType->search($line, 'ipsum');
    }

}