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

use RuntimeException;

/**
 * Implementation of Random using the Mersenne Twister RNG provided by PHP.
 */
class MersenneTwister implements Random
{
    private readonly int $randMax;

    public function __construct()
    {
        $this->randMax = mt_getrandmax();
    }

    public function seed(int $seed): void
    {
        mt_srand($seed);
    }

    public function random(int $min, int $max): int
    {
        if ($max < $min) {
            throw new RuntimeException("Upper bound must be greater than lower bound.");
        }

        if ($max - $min > $this->randMax) {
            throw new RuntimeException("Random range is greater than the maximum allowed range.");
        }

        return mt_rand($min, $max);
    }
}
