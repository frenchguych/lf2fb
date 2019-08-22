<?php

declare(strict_types=1);

namespace Frenchguy\Tests\HealthKit;

use PHPUnit\Framework\TestCase;
use Frenchguy\HealthKit\Parser;

final class ParserTest extends TestCase
{
	public function testCannotBeCreatedFromNonExistingFile() : void
	{
		$this->expectException(\InvalidArgumentException::class);
		Parser::fromFile("nonexistring.zip");
	}

	public function testCannotBeCreatedFromNonZipFile():  void
	{
		$this->expectException(\InvalidArgumentException::class);
		Parser::fromFile(__FILE__);
	}

	public function testCanBeCreatedFromAValidZipFile(): void
	{
		$p = Parser::fromFile(__DIR__ . "/exporter.zip");
		$this->assertInstanceOf(Parser::class, $p);
	}
}
