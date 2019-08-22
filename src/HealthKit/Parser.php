<?php

declare(strict_types=1);

namespace Frenchguy\HealthKit;

final class Parser
{
    private function __construct(string $file)
    {
    }

    public static function fromFile(string $file) : self
    {
        if (!\file_exists($file)) {
            throw new \InvalidArgumentException("File not found : $file");
		}
		$z = new \ZipArchive();
		if ($z->open($file) !== TRUE) {
			throw new \InvalidArgumentException("Not a zip file : $file");
		}
        return new self($file);
    }
}
