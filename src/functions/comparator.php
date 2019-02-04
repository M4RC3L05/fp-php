<?php

namespace FPPHP\Functions;

/**
 * 
 * comparator: ((x, y) -> bool) -> ((x, y) -> int)
 * 
 * Returns a new comparator functions based on the perdicate
 * function first provided, wich dictates whether the first element
 * is less that the second
 * 
 * @param callable $fn
 * @return callable
 * 
 */
function comparator(callable $perdicate)
{
    return function ($x, $y) use ($perdicate) {
        return $perdicate($x, $y) ? -1 : ($perdicate($y, $x) ? 1 : 0);
    };
}
        