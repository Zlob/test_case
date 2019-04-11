<?php

namespace Tests\Integration;

use PHPUnit\Framework\TestCase;

class StringPositionDetectorTest extends TestCase
{
    /**
     * @test
     */
    public function return_result_if_needle_exist()
    {
        $source = new \Searcher\Sources\LocalFileSource(__DIR__ . '/../fixtures/text.txt');
        $searcher = new \Searcher\SearchTypes\SearchByStrpos();
        $detector = new \Searcher\StringPositionDetector($source, $searcher);

        $result = $detector->search('ipsum');
        $this->assertEquals(true, $result->isFound());
        $this->assertEquals(0, $result->lineNumber());
        $this->assertEquals(6, $result->charPosition());

        $result = $detector->search('eiusmod');
        $this->assertEquals(true, $result->isFound());
        $this->assertEquals(0, $result->lineNumber());
        $this->assertEquals(7, $result->charPosition());

        $result = $detector->search('sometext');
        $this->assertEquals(false, $result->isFound());
    }
}