<?php declare(strict_types=1);
/*
 * This file is part of Proclaim.
 *
 * Copyright (C) Marijn van Wezel
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Proclaim\Generator;

use Proclaim\Random\Random;

/**
 * @template T
 */
interface Generator
{
    /**
     * Generate a random value of type `T`.
     *
     * @param Random $random The random number generator to use
     *
     * @return T
     */
    public function generate(Random $random): mixed;
}
