<?php declare(strict_types=1);
/*
 * This file is part of Proclaim.
 *
 * Copyright (C) Marijn van Wezel
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Proclaim\Arbitrary;

use Proclaim\Generator\Generator;

/**
 * @template T
 */
abstract class Arbitrary
{
    /**
     * Gives a generator for values of type `T`.
     *
     * @return Generator<T>
     */
    abstract public function arbitrary(): Generator;

    /**
     * Returns the list of all possible reductions of the given value.
     *
     * @param T $value The value to shrink
     * @return T[]
     */
    public function reduce(mixed $value): array
    {
        return [];
    }
}
