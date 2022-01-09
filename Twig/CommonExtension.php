<?php
/*
 * This file is part of the SoureCode package.
 *
 * (c) Jason Schilling <jason@sourecode.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SoureCode\Component\Common\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

/**
 * @author Jason Schilling <jason@sourecode.dev>
 */
class CommonExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('soure_code_common_merge_attr', [CommonRuntime::class, 'mergeAttributes']),
        ];
    }
}
