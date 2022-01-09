<?php
/*
 * This file is part of the SoureCode package.
 *
 * (c) Jason Schilling <jason@sourecode.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SoureCode\Component\Common\Tests\Twig;

use PHPUnit\Framework\TestCase;
use SoureCode\Component\Common\Twig\CommonRuntime;

/**
 * @author Jason Schilling <jason@sourecode.dev>
 */
class CommonRuntimeTest extends TestCase
{
    public function testMergeAttributes(): void
    {
        $runtime = new CommonRuntime();

        $first = [
            'class' => 'foo',
            'id' => 'bar',
            'style' => 'color: red; background-color: yellow;',
            'data-foo' => 'bar',
            'data-bar' => 'foo',
        ];

        $second = [
            'class' => 'bar',
            'id' => 'foo',
            'style' => 'color: blue;font-weight: bold',
            'data-foo' => 'foo',
            'data-bar' => 'bar',
        ];

        $expected = [
            'class' => 'foo bar',
            'id' => 'foo',
            'style' => 'color: blue;background-color: yellow;font-weight: bold;',
            'data-foo' => 'foo',
            'data-bar' => 'bar',
        ];

        $this->assertEquals($expected, $runtime->mergeAttributes($first, $second));
    }
}
