<?php

namespace FPPHP\Functions;

/**
 * 
 * applyTo: x -> (x -> y) -> y
 * 
 * Applies the given value to the given function and returns
 * the result of that operation
 * 
 * @param mixed $value
 * @param callable $fn
 * @return array
 * 
 */
function applyTo($vallue)
{
    return function (callable $fn) use ($vallue) {
        return $fn($vallue);
    };
}
