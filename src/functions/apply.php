<?php

namespace FPPHP\Functions;

/**
 * 
 * apply: (*... -> x) -> [*] -> x
 * 
 * Applies to the given function the list of arguments
 * 
 * @param callable $fn
 * @param array $args
 * @return mixed
 * 
 */
function apply(callable $fn)
{
    return function (array $args) use ($fn) {
        return $fn(...$args);
    };
}
