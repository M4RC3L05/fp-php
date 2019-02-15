<?php

namespace FPPHP\Functions;

/**
 *
 * tap: (x -> *) -> x -> x
 *
 * Runs the given function with the arg and returns the suplied arg
 *
 * @param callable $fn
 * @param mixed $arg
 * @return mixed
 *
 */
function tap(callable $fn)
{
    return function ($arg) use ($fn) {
        $fn($arg);
        return $arg;
    };
}
