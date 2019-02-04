<?php

namespace FPPHP\Functions;

/**
 * 
 * constructN: int -> (* -> {*}) -> (* -> {*})
 * 
 * Curries the __construct function by the given number
 * 
 * @param int $numArgs
 * @param string $className
 * @return callable
 * 
 */
function constructN(int $numArgs)
{
    return function (string $className) use ($numArgs) {
        $args = [];

        $inner = function ($x) use ($numArgs, &$args, &$inner, $className) {
            \array_push($args, $x);

            if (\count($args) < $numArgs) return $inner;

            return new $className(...$args);
        };

        return $inner;
    };
}
        