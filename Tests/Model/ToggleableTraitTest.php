<?php

namespace SoureCode\Component\Common\Tests\Model;

use PHPUnit\Framework\TestCase;
use SoureCode\Component\Common\Tests\Model\Mock\ToggleableMock;

class ToggleableTraitTest extends TestCase
{
    public function testGetSetIsEnableDisable(): void
    {
        // Arrange
        $mock = new ToggleableMock();

        // Act and Assert
        self::assertTrue($mock->isEnabled());
        $mock->setEnabled(false);
        self::assertFalse($mock->isEnabled());
        $mock->enable();
        self::assertTrue($mock->isEnabled());
        $mock->disable();
        self::assertFalse($mock->isEnabled());
    }
}
