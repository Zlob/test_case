<?php


namespace Searcher\Sources;


use Iterator;

class LocalFileSource implements iSource
{

    protected $file;

    public function __construct(string $filename)
    {
        $this->file = fopen($filename, 'r');
        if (!$this->file) {
            throw new \InvalidArgumentException();
        }
    }

    function getIterator(): Iterator
    {
        while ($line = fgets($this->file)) {
            yield $line;
        }
        fclose($this->file);
    }
}