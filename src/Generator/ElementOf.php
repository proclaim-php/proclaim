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
 * Picks an element from the list.
 *
 * @template T
 * @param non-empty-array<T> $elements The elements to pick from.
 * @return Generator<T>
 */
function elementOf(array $elements): Generator
{
    return new ElementOf($elements);
}

/**
 * Picks an element from the list.
 *
 * @template T
 * @implements Generator<T>
 */
class ElementOf implements Generator
{
    /**
     * @var non-empty-list<T> The elements to pick from.
     */
    private readonly array $elements;

    /**
     * @var positive-int The length of $this->elements.
     */
    private readonly int $length;

    /**
     * @param non-empty-list<T> $elements The elements to pick from.
     */
    public function __construct(array $elements)
    {
        $this->elements = $elements;
        $this->length = count($this->elements);
    }

    /**
     * @return T
     */
    public function generate(Random $random): mixed
    {
        $index = $random->random(0, $this->length);

        return $this->elements[$index];
    }
}
