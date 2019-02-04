<?php

namespace FPPHP\Functions;

use function FPPHP\Lists\map;

/**
 * 
 * juxt: [(x, y, …, m) -> n] -> ((x, y, …, m) -> [n])
 * 
 * Creates a function that returns the provided argument
 * 
 * @param array $fns
 * @return callable
 * 
 */
function juxt(array $fns)
{
    return function (...$args) use ($fns) {
        return map(function ($fn) use ($args) {
            return $fn(...$args);
        })($fns);
    };
}
        