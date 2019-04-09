<?php


class StringPositionDetector
{

    /**
     * @var string
     */
    private $filename;

    public function __construct(string $filename)
    {
        $this->filename = $filename;
    }

    public function search(string $needle)
    {
        $lineNumber = 0;
        $handler = fopen($this->filename, 'r');
        while(!feof($handler))  {
            $line = fgets($handler);
            $position = strpos($line, $needle);
            if ($position !== false) {
                return new Result($lineNumber, $position);
            }
            $lineNumber++;
        }
    }
}