<?php


use PHPUnit\Framework\TestCase;

class SearcherTest extends TestCase
{
    /**
     * @test
     */
    public function testCanBeUsedAsString()
    {
        $searcher = new Searcher();
        $result = $searcher->search('some', 'fixtures\text.txt');
        $this->assertEquals($result->getNumber(), 1);
        $this->assertEquals($result->getPosition(), 1);
    }
}