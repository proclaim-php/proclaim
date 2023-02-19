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

/**
 * Creates a new proclamation for the given property.
 *
 * @param callable(mixed...): bool $property
 * @return Proclamation
 */
function proclaim(callable $property): Proclamation
{
    return new Proclamation($property);
}
