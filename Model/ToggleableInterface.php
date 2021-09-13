<?php

namespace SoureCode\Component\Common\Model;

/**
 * @author Jason Schilling <jason@sourecode.dev>
 */
interface ToggleableInterface
{
    public function isEnabled(): bool;

    public function setEnabled(?bool $enabled): void;

    public function enable(): void;

    public function disable(): void;
}
