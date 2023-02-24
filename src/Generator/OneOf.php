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
 * Uses one of the given generators.
 *
 * @template T
 * @param non-empty-array<Generator<T>> $generators The generators to pick from.
 * @return Generator<T>
 */
function oneOf(array $generators): Generator
{
    return new OneOf($generators);
}

/**
 * Uses one of the given generators.
 *
 * @template T
 * @implements Generator<T>
 */
class OneOf implements Generator
{
    /**
     * @var non-empty-array<Generator<T>> $generators The generators to pick from.
     */
    private readonly array $generators;

    /**
     * @param non-empty-array<Generator<T>> $generators The generators to pick from.
     */
    public function __construct(array $generators)
    {
        $this->generators = $generators;
    }

    public function generate(Random $random): mixed
    {
        return elementOf($this->generators)->generate($random);
    }
}
