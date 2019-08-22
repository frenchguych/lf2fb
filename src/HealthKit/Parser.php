<?php
declare(strict_types=1);

namespace Frenchguy\HealthKit;

final class Parser
{
    /**
     * Constructor.
     */
    private function __construct()
    {
    }   

    /**
     * Factory method.
     *
     * @param string $file path to zip archive
     * 
     * @return Parser
     */
    public static function fromFile(string $file) : self
    {
        if (!\file_exists($file)) {
            throw new \InvalidArgumentException("File not found : $file");
        }
        $z = new \ZipArchive();
        if ($z->open($file) !== true) {
            throw new \InvalidArgumentException("Not a zip file : $file");
        }
        return new self();
    }
}
