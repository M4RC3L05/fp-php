<?php

namespace FPPHP\Functions;

/**
 * 
 * partialRight: ((a, b, c, …, n) → x) → [d, e, f, …, n] → ((a, b, c, …) → x)
 * 
 * Takes a function f and returns a function g
 * Returns the result of applying f to the args passed to g 
 * followed by the arguments passed initialy
 * 
 * @param callable $fn
 * @param array $lastArgs
 * @param array $firsts
 * @return mixed
 * 
 */
function partialRight(callable $fn)
{
    return function (array $lastArgs) use ($fn) {
        return function (...$firsts) use ($fn, $lastArgs) {
            return $fn(...\array_merge($firsts, $lastArgs));
        };
    };
}
