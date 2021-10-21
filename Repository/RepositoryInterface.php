<?php
/*
 * This file is part of the SoureCode package.
 *
 * (c) Jason Schilling <jason@sourecode.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SoureCode\Component\Common\Repository;

use Doctrine\Common\Collections\Selectable;
use Doctrine\Persistence\ObjectRepository;

/**
 * @template T
 * @template-implements Selectable<int,T>
 * @template-implements ObjectRepository<T>
 */
interface RepositoryInterface extends ObjectRepository, Selectable
{
    public function flush(): void;

    /**
     * @return object
     *
     * @psalm-return T
     */
    public function get(mixed $id);

    /**
     * @param object $entity
     *
     * @psalm-param T $entity
     */
    public function persist($entity, bool $flush = true): void;

    /**
     * @param object $entity
     *
     * @psalm-param T $entity
     */
    public function remove($entity, bool $flush = true): void;
}
