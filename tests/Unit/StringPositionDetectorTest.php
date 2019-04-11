<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class StringPositionDetectorTest extends TestCase
{
    /**
     * @test
     */
    public function can_search_needle()
    {
        $line = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit,
';
        $successResult = $this->createMock(\Searcher\Results\Line\iLineSearchResult::class);
        $successResult->method('isFound')->willReturn(true);
        $successResult->method('charPosition')->willReturn(6);

        $searcher = $this->createMock(\Searcher\SearchTypes\iSearchType::class);
        $searcher->method('search')
            ->with($line, 'ipsum')
            ->willReturn($successResult);

        $iterator = $this->createMock(\Iterator::class);
        $iterator->method('current')->willReturn($line);
        $iterator->method('valid')->willReturn(true);

        $source = $this->createMock(\Searcher\Sources\iSource::class);
        $source->method('getIterator')->willReturn($iterator);

        $detector = new \Searcher\StringPositionDetector($source, $searcher);
        $result = $detector->search('ipsum');

        $this->assertEquals(true, $result->isFound());
        $this->assertEquals(0, $result->lineNumber());
        $this->assertEquals(6, $result->charPosition());
    }
}