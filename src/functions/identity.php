<?php

namespace FPPHP\Functions;

/**
 * 
 * identity: x -> x
 * 
 * Creates a function that returns the provided argument
 * 
 * @param callable $fn
 * @return callable
 * 
 */
function identity($arg)
{
    return $arg;
}
        