<?php

namespace FPPHP\Functions;

/**
 *
 * thunkify: ((a, b, …, j) → k) → (a, b, …, j) → (() → k)
 *
 * Returns a a delayed function aut of the function and args provided
 * that only will be executed when needed
 *
 * @param callable $fn
 * @param mixed $args
 * @return mixed
 *
 */
function thunkify(callable $fn)
{
    return function (...$args) use ($fn) {
        return function () use ($args, $fn) {
            return $fn(...$args);
        };
    };
}
