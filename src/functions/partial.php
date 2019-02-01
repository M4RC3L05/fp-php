<?php

namespace FPPHP\Functions;

/**
 * 
 * partial: ((a, b, c, …, n) → x) → [a, b, c, …] → ((d, e, f, …, n) → x)
 * 
 * Takes a function f and returns a function g
 * Returns the result of applying f to the arguments passed initialy
 * followed by the args passed to g
 * 
 * @param callable $fn
 * @param array $firstArgs
 * @param array $rest
 * @return mixed
 * 
 */
function partial(callable $fn)
{
    return function (array $firstArgs) use ($fn) {
        return function (...$rest) use ($firstArgs, $fn) {
            return $fn(...\array_merge($firstArgs, $rest));
        };
    };
}
