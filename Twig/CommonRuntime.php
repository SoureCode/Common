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

use Traversable;
use Twig\Error\RuntimeError;
use Twig\Extension\RuntimeExtensionInterface;

/**
 * @author Jason Schilling <jason@sourecode.dev>
 */
class CommonRuntime implements RuntimeExtensionInterface
{
    private string $cssExpression = '/([a-zA-Z-]+):([^};]+)/m';

    private array $defaultOptions;

    public function __construct(array $defaultOptions = [])
    {
        $this->defaultOptions = array_merge($defaultOptions, [
            'merge_class' => true,
            'merge_style' => true,
        ]);
    }

    public function mergeAttributes(array $first, array $second, array $options = []): array
    {
        if (!$this->twig_test_iterable($first)) {
            throw new RuntimeError(sprintf('The merge filter only works with arrays or "Traversable", got "%s" as first argument.', \gettype($first)));
        }

        if (!$this->twig_test_iterable($second)) {
            throw new RuntimeError(sprintf('The merge filter only works with arrays or "Traversable", got "%s" as second argument.', \gettype($second)));
        }

        $first = $this->twig_to_array($first);
        $second = $this->twig_to_array($second);

        $options = array_merge($this->defaultOptions, $options);

        if ($options['merge_class']) {
            if (isset($first['class'], $second['class'])) {
                $second['class'] = array_merge(explode(' ', $first['class']), explode(' ', $second['class']));
                $second['class'] = array_unique($second['class']);
                $second['class'] = implode(' ', $second['class']);
            }
        }

        if ($options['merge_style']) {
            if (isset($first['style'], $second['style'])) {
                $second['style'] = array_merge($this->parseStyle($first['style']), $this->parseStyle($second['style']));
                $second['style'] = $this->stringifyStyle($second['style']);
            }
        }

        return array_merge($first, $second);
    }

    private function parseStyle(string $style): array
    {
        preg_match_all($this->cssExpression, $style, $matches, \PREG_SET_ORDER);
        $styles = [];

        foreach ($matches as $match) {
            $styles[$match[1]] = $match[2];
        }

        return $styles;
    }

    private function stringifyStyle(array $style): string
    {
        $string = '';

        foreach ($style as $key => $value) {
            $string .= sprintf('%s:%s;', $key, $value);
        }

        return $string;
    }

    /**
     * @source https://github.com/twigphp/Twig/blob/93d26f908cdf96ba4436a22baaa2ead7e11b8500/src/Extension/CoreExtension.php#L1272
     */
    private function twig_test_iterable(mixed $value): bool
    {
        return $value instanceof \Traversable || \is_array($value);
    }

    /**
     * @source https://github.com/twigphp/Twig/blob/93d26f908cdf96ba4436a22baaa2ead7e11b8500/src/Extension/CoreExtension.php#L1218
     */
    private function twig_to_array(Traversable|array $seq, bool $preserveKeys = true): array
    {
        if ($seq instanceof \Traversable) {
            return iterator_to_array($seq, $preserveKeys);
        }

        return $preserveKeys ? $seq : array_values($seq);
    }
}
