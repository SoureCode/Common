<?php

namespace SoureCode\Component\Common\Model;

use DateTimeInterface;

/**
 * @author Jason Schilling <jason@sourecode.dev>
 */
interface CreatedAtInterface
{
    public function getCreatedAt(): ?DateTimeInterface;

    public function setCreatedAt(?DateTimeInterface $createdAt): void;
}
