<?php


use PHPUnit\Framework\TestCase;

class SearcherTest extends TestCase
{
    /**
     * @test
     */
    public function testCanBeUsedAsString()
    {
        $searcher = new Searcher(__DIR__ . DIRECTORY_SEPARATOR . 'fixtures\text.txt');
        $result = $searcher->search('Lorem');
        $this->assertEquals($result->getNumber(), 0);
        $this->assertEquals($result->getPosition(), 0);

        $result = $searcher->search('veniam');
        $this->assertEquals($result->getNumber(), 2);
        $this->assertEquals($result->getPosition(), 17);
    }
}