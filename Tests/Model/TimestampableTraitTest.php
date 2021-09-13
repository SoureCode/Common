<?php

namespace SoureCode\Component\Common\Tests\Model;

use DateTime;
use PHPUnit\Framework\TestCase;
use SoureCode\Component\Common\Tests\Model\Mock\TimestampableMock;

class TimestampableTraitTest extends TestCase
{
    public function testGetSetCreatedAt(): void
    {
        // Arrange
        $mock = new TimestampableMock();
        $timestamp = new DateTime();

        // Act and Assert
        self::assertNull($mock->getCreatedAt());
        $mock->setCreatedAt($timestamp);
        self::assertSame($timestamp, $mock->getCreatedAt());
    }

    public function testGetSetUpdatedAt(): void
    {
        // Arrange
        $mock = new TimestampableMock();
        $timestamp = new DateTime();

        // Act and Assert
        self::assertNull($mock->getUpdatedAt());
        $mock->setUpdatedAt($timestamp);
        self::assertSame($timestamp, $mock->getUpdatedAt());
    }
}
