<?php


use PHPUnit\Framework\TestCase;

class StringPositionDetectorTest extends TestCase
{
    /**
     * @test
     */
    public function can_search_needle_unit()
    {

        $source = new \Searcher\Sources\LocalFileSource(__DIR__ . '/../fixtures/text.txt');
        $searcher = new \Searcher\SearchTypes\SearchByStrpos();
        $detector = new \Searcher\StringPositionDetector($source, $searcher);

        $result = $detector->search('ipsum');
        $this->assertEquals(0, $result->getNumber());
        $this->assertEquals(6, $result->getPosition());

        $result = $detector->search('eiusmod');
        $this->assertEquals(0, $result->getNumber());
        $this->assertEquals(7, $result->getPosition());
    }
}