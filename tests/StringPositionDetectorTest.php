<?php


use PHPUnit\Framework\TestCase;

class StringPositionDetectorTest extends TestCase
{
    /**
     * @test
     */
    public function can_search_needle()
    {
        $successResult = $this->createMock(\Searcher\Results\Line\iSearchResult::class);
        $successResult->method('isFound')->willReturn(true);
        $successResult->method('position')->willReturn(6);

        $searcher = $this->createMock(\Searcher\SearchTypes\iSearchType::class);
        $searcher->method('search')
            ->with('Lorem ipsum dolor sit amet, consectetur adipiscing elit,
', 'ipsum')
            ->willReturn($successResult);

        $detector = new \Searcher\StringPositionDetector(__DIR__ . '/fixtures/text.txt', $searcher);
        $result = $detector->search('ipsum');

        $this->assertEquals(0, $result->getNumber());
        $this->assertEquals(6, $result->getPosition());
    }
}