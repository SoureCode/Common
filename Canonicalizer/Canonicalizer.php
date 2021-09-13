<?php

namespace SoureCode\Component\Common\Canonicalizer;

use Symfony\Component\String\UnicodeString;

class Canonicalizer implements CanonicalizerInterface
{
    public function canonicalize(?string $value): ?string
    {
        if (null === $value) {
            return null;
        }

        $string = new UnicodeString($value);

        return $string->lower()->toString();
    }
}
