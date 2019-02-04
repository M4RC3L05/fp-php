<?php

namespace FPPHP\Functions;

/**
 * 
 * flip: ((x, y, z, …) -> c) -> (y -> x -> z -> … -> c)
 * 
 * Creates a function that swaps the 2 first arguments
 * 
 * @param callable $fn
 * @return callable
 * 
 */
function flip(callable $fn)
{

    return curryN(((new \ReflectionFunction(\Closure::fromCallable($fn)))->getNumberOfParameters()))(function ($x, $y, ...$args) use ($fn) {
        return $fn($y, $x, ...$args);
    });
}
        