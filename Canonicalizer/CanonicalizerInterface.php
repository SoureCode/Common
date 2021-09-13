<?php

namespace SoureCode\Component\Common\Canonicalizer;

/**
 * @author Jason Schilling <jason@sourecode.dev>
 */
interface CanonicalizerInterface
{
    public function canonicalize(?string $value): ?string;
}
