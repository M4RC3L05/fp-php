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
    $numOfArgs = (new \ReflectionFunction(\Closure::fromCallable($fn)))->getNumberOfRequiredParameters();

    $inner = function ($args) use ($numOfArgs, &$inner, $fn) {
        return function ($arg = null) use ($numOfArgs, &$inner, $fn, $args) {

            if ($numOfArgs <= 0) return \call_user_func($fn);

            \array_push($args, $arg);

            if (count($args) < $numOfArgs)
                return $inner($args);
            else
                return $fn(...$args);
        };
    };

    return $inner([]);
}
