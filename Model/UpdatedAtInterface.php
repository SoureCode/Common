<?php

namespace SoureCode\Component\Common\Model;

use DateTimeInterface;

/**
 * @author Jason Schilling <jason@sourecode.dev>
 */
interface UpdatedAtInterface
{
    public function getUpdatedAt(): ?DateTimeInterface;

    public function setUpdatedAt(?DateTimeInterface $updatedAt): void;
}
