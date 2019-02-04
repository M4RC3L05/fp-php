<?php

namespace FPPHP\Functions;

/**
 * 
 * curry: int -> (* -> a) -> (* -> a)
 * 
 * Returns the curried version of the provided function by n
 * 
 * @param int $nCurry
 * @param callable $fn
 * @return callable
 * 
 */
function curryN(int $nCurry)
{
    return function (callable $fn) use ($nCurry) {
        $numOfArgs = $nCurry;
        $args = [];

        $inner = function ($x = null) use ($numOfArgs, &$inner, $fn, &$args) {
            \array_push($args, $x);

            if (\count($args) < $numOfArgs) return $inner;

            return $fn(...$args);
        };

        return $inner;
    };
}
        