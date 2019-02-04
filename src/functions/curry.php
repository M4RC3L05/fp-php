<?php

namespace FPPHP\Functions;

/**
 * 
 * curry: (* -> a) -> (* -> a)
 * 
 * Returns the curried version of the provided function
 * 
 * @param callable $fn
 * @return callable
 * 
 */
function curry(callable $fn)
{
    $numOfArgs = (new \ReflectionFunction(\Closure::fromCallable($fn)))->getNumberOfParameters();
    $args = [];

    $inner = function ($x = null) use ($numOfArgs, &$inner, $fn, &$args) {
        \array_push($args, $x);

        if (\count($args) < $numOfArgs) return $inner;

        return $fn(...$args);
    };

    return $inner;
}
