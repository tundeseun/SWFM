<?php

declare(strict_types=1);

namespace NunoMaduro\Collision\Contracts;

<<<<<<< HEAD
use Spatie\Ignition\Contracts\Solution;
=======
use Spatie\ErrorSolutions\Contracts\Solution;
>>>>>>> tundeseun/devtest
use Throwable;

/**
 * @internal
 */
interface SolutionsRepository
{
    /**
     * Gets the solutions from the given `$throwable`.
     *
     * @return array<int, Solution>
     */
    public function getFromThrowable(Throwable $throwable): array;
}
