<?php

namespace Searcher\Sources;

class LocalFileSource implements \Iterator
{

    protected $file;
    protected $data;
    protected $key;

    public function __construct($filename)
    {
        $this->file = fopen($filename, 'r');
        if (!$this->file) {
            throw new \InvalidArgumentException('$filename must be valid path to file');
        }
    }

    public function __destruct() {
        fclose($this->file);
    }

    public function current()
    {
        return fgets($this->file);
    }

    public function next()
    {
        $this->data = fgets($this->file);
        $this->key++;
    }

    public function key()
    {
        return $this->key;
    }

    public function valid()
    {
        return false !== $this->data;
    }

    public function rewind()
    {
        fseek($this->file, 0);
        $this->data = fgets($this->file);
        $this->key = 0;
    }
}