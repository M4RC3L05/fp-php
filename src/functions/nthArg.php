<?php

namespace FPPHP\Functions;

/**
 * 
 * nAry: int -> *... -> *
 * 
 * Returns the nth arg
 * 
 * @param int $n
 * @return callable
 * 
 */
function nthArg(int $n)
{
    return function (...$args) use ($n) {
        $size = \count($args);

        if ($size <= 0) return null;

        $fPost = ($n < 0 ? $size + $n : $n);

        if ($fPost >= $size) return $args[$size - 1];

        if ($fPost <= -$size) return $args[0];

        return $args[$fPost];
    };
}
        