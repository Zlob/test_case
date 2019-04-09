<?php


use PHPUnit\Framework\TestCase;

class SearcherTest extends TestCase
{
    /**
     * @test
     */
    public function test_can_search_needle()
    {
        $searcher = new StringPositionDetector(__DIR__ . DIRECTORY_SEPARATOR . 'fixtures\text.txt');
        $result = $searcher->search('Lorem');
        $this->assertEquals(0, $result->getNumber());
        $this->assertEquals(0, $result->getPosition());

        $result = $searcher->search('veniam');
        $this->assertEquals(2, $result->getNumber());
        $this->assertEquals(17, $result->getPosition());
    }

    /**
     * @test
     */
    public function test_can_load_remote_file()
    {
        $searcher = new StringPositionDetector('https://raw.githubusercontent.com/Zlob/shtrafomet/master/LICENSE.md');
        $result = $searcher->search('Samuel ');
        $this->assertEquals(2, $result->getNumber());
        $this->assertEquals(19, $result->getPosition());

    }
}