<?php

namespace FPPHP\Functions;

/**
 * 
 * call: (*... -> a) -> *... -> a
 * 
 * Returns a new function that calls the first argument 
 * with the rest of the arguments
 * 
 * @param callable $fn
 * @param mixed $args
 * @return callable
 * 
 */

function call(callable $fn)
{
    return function (...$args) use ($fn) {
        return $fn(...$args);
    };
}
        