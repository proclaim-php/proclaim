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
 * Picks the left or the right value.
 *
 * @template T
 * @param T $left
 * @param T $right
 * @return Generator<T>
 */
function either(mixed $left, mixed $right): Generator
{
    return new Either($left, $right);
}

/**
 * Picks the left or the right value.
 *
 * @template T
 * @implements Generator<T>
 */
class Either implements Generator
{
    /**
     * @var T
     */
    private readonly mixed $left;

    /**
     * @var T
     */
    private readonly mixed $right;

    /**
     * @param T $left
     * @param T $right
     */
    public function __construct(mixed $left, mixed $right)
    {
        $this->left = $left;
        $this->right = $right;
    }

    /**
     * @return T
     */
    public function generate(Random $random): mixed
    {
        return $random->random(0, 1) === 0 ?
            $this->left :
            $this->right;
    }
}
