<?php

namespace FPPHP\Functions;

use function FPPHP\Lists\map;

/**
 * 
 * compose: ((* -> *), [(y -> z), (x -> y), …, (o -> p), ((a, b, …, n) -> o)]) -> ((a, b, …, n) -> z)
 * 
 * Composes functions from right to left, fiven a function
 * 
 * @param callable $check
 * @param mixed $fns
 * @return callable
 * 
 */
function composeWith(callable $check)
{
    return function (array $fns) use ($check) {
        $argsProsessed = map(function ($x) use ($check) {
            return curry($check)($x);
        })($fns);

        return compose(...$argsProsessed);
    };
}
        