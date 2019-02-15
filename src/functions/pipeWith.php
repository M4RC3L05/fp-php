<?php

namespace FPPHP\Functions;

use function FPPHP\Lists\reduce;

/**
 *
 * pipeWith: ((* → *), [((a, b, …, n) → o), (o → p), …, (x → y), (y → z)]) → ((a, b, …, n) → z)
 *
 * Similar to compose but functions are composed from left to right with a callable
 *
 * @param callable $callable
 * @param array $fns
 * @param mixed $arg
 * @return callable
 *
 */
function pipeWith(callable $callable)
{
    return function (array $fns) use ($callable) {
        return function ($arg) use ($fns, $callable) {
            return reduce(function ($acc, $curr) use ($callable) {
                return $callable($curr, $acc);
            })($arg)($fns);
        };
    };
}
