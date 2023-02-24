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

use Proclaim\Arbitrary\Arbitrary;
use Proclaim\Result\Failure;
use Proclaim\Result\Falsified;
use Proclaim\Result\Success;

/**
 * Creates a new proclamation for the given property.
 *
 * @param callable(mixed...): bool $property The property to test.
 */
function proclaim(callable $property): Proclamation
{
    return new Proclamation($property);
}

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
    private readonly mixed $property;

    /**
     * @var array<string, class-string<Arbitrary>> The arbitrary classes to use.
     */
    private array $arbitraries;

    /**
     * @var positive-int A number greater than zero specifying the maximum number
     *                   of successful tests.
     */
    private int $maxSuccessTests = 100;

    /**
     * @var int<0, max> The number of successful tests that have been performed.
     */
    private int $numSuccessTests = 0;

    /**
     * @param callable(mixed...): bool $property The property to check.
     */
    public function __construct(callable $property)
    {
        $this->property = $property;
    }

    /**
     * Configures the maximum number of successful tests.
     *
     * @param positive-int $maxSuccessTests The maximum number of successful tests.
     * @return $this
     */
    public function withMaxSuccess(int $maxSuccessTests): self
    {
        $this->maxSuccessTests = $maxSuccessTests;

        return $this;
    }

    /**
     * Adds the given arbitrary classes.
     *
     * @param array<string, class-string<Arbitrary>> $arbitraries The arbitrary classes to add.
     * @return $this
     */
    public function withArbitraries(array $arbitraries): self
    {
        $this->arbitraries = array_merge($this->arbitraries, $arbitraries);

        return $this;
    }

    /**
     * Test the property and return the result. By default, up to 100 tests
     * are performed. This may not be enough to find all bugs, especially if
     * your property has many inputs. You can use `Proclamation::withMaxSuccess()`
     * to set the maximum number of successful tests.
     *
     * This method will return a Failure object if an exception was thrown or a
     * failure condition was met during testing, a Falsified object if a counter-example
     * for the property was found, or a Success object if no counter-example was found.
     *
     * @return Failure|Falsified|Success
     */
    public function test(): Failure|Falsified|Success
    {

    }

    /**
     * Allow this class to be invoked directly. This serves as sugar to calling the
     * `test` method explicitly.
     *
     * @return Failure|Falsified|Success
     */
    public function __invoke(): Failure|Falsified|Success {
        return $this->test();
    }
}
