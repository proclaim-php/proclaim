<?php declare(strict_types=1);
/*
 * This file is part of Proclaim.
 *
 * Copyright (C) Marijn van Wezel
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Proclaim;

use AssertionError;

/**
 * A class that wraps a property so that it can be tested, and provides a number
 * of options to specify how the tests should be run and how the results should
 * be presented.
 *
 * @author Marijn van Wezel <marijnvanwezel@gmail.com>
 */
class Proclamation
{
    /**
     * @var callable(mixed...): bool The property to test.
     */
    private $property;

    /**
     * @var positive-int A number greater than zero specifying the maximum number
     *                   of tests to perform.
     */
    private int $maxNumTests = 100;

    /**
     * @param callable(mixed...): bool $property The property to check.
     */
    public function __construct(callable $property)
    {
        $this->property = $property;
    }

    /**
     * Configures the maximum number of tests to perform.
     *
     * @param positive-int $maxNumTests The maximum number of tests to perform.
     * @return $this
     */
    public function withMaxTests(int $maxNumTests): self
    {
        $this->maxNumTests = $maxNumTests;

        return $this;
    }

    /**
     * Test the property and print the results to `stdout`.
     *
     * @return void
     */
    public function print(): void
    {

    }
}
