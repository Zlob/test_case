<?php


namespace Searcher\Sources;


use Iterator;

class LocalFileSource implements iSource
{

    /**
     * Источник данных
     *
     * @var resource
     */
    protected $file;

    /**
     * Итератор по строкам локального файла
     *
     * LocalFileSource constructor.
     * @param string $filename
     */
    public function __construct(string $filename)
    {
        $this->file = fopen($filename, 'r');
        if (!$this->file) {
            throw new \InvalidArgumentException();
        }
    }

    /**
     * @return Iterator
     */
    function getIterator(): Iterator
    {
        while ($line = fgets($this->file)) {
            yield $line;
        }
        fclose($this->file);
    }
}