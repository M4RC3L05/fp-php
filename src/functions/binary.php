<?php

namespace FPPHP\Functions;

/**
 * 
 * binary: (* -> z) -> (x, y -> z) 
 * 
 * takes a function of any arity and returns a function that
 * only accepts 2 parameters end passes them to the wrapped
 * function
 * 
 * @param callable $fn
 * @param mixed $arg1
 * @param mixed $arg2
 * @return callable
 * 
 */
function binary(callable $fn)
{
    return function ($arg1, $arg2) use ($fn) {
        $numOfArgs = (new \ReflectionFunction(\Closure::fromCallable($fn)))->getNumberOfRequiredParameters();

        $arrArgs = [$arg1, $arg2];

        $rest = $numOfArgs - \count($arrArgs);

        if ($rest <= 0)
            return $fn($arg1, $arg2);

        else {
            $tmpArr = \array_fill(0, $rest, null);
            return $fn(...(\array_merge($arrArgs, $tmpArr)));
        }
    };
}
        