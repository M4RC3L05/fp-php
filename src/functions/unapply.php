<?php

namespace FPPHP\Functions;


/**
 *
 * unapply: ([*…] -> a) -> (*… -> a)
 *
 * Takes a function that receaves a single array argument and returns
 * a function that recieves any argument and calls the provided function
 * with the args as an array and returns the result
 *
 * @param callable $fn
 * @param mixed $args
 * @return mixed
 *
 */
function unapply(callable $fn)
{
    return function (...$args) use ($fn) {
        return $fn($args);
    };
}
