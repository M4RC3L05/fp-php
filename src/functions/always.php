<?php

namespace FPPHP\Functions;

/**
 * 
 * always: x -> (* -> x)
 * 
 * Retuns a new function that always returns the given values.
 * 
 * @param mixed $value
 * @return mixed $value
 * 
 */
function always($value)
{
    return function () use ($value) {
        return $value;
    };
}
