<?php
/*
 * This file is part of the SoureCode package.
 *
 * (c) Jason Schilling <jason@sourecode.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SoureCode\Component\Common\Model;

/**
 * @author Jason Schilling <jason@sourecode.dev>
 */
trait TimestampableTrait
{
    use CreatedAtTrait;
    use UpdatedAtTrait;
}
