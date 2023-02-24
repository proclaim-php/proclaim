<?php declare(strict_types=1);
/*
 * This file is part of Proclaim.
 *
 * Copyright (C) Marijn van Wezel
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Proclaim\Random;

interface Random
{
    /**
     * Set the seed for the random number generator.
     *
     * @param positive-int $seed The seed for the random number generator.
     */
    public function seed(int $seed): void;

    /**
     * Generates a random integer between `$min` (inclusive) and `$max`
     * (inclusive) with uniform distribution.
     *
     * @param int $min The lower bound (must be less than or equal to $max).
     * @param int $max The upper bound (must be greater than or equal to $min).
     *
     * @return int An integer between `$min` (inclusive) and `$max` (inclusive).
     */
    public function random(int $min, int $max): int;
}
