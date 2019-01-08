<?php

namespace FPPHP\Functions;

function curry($fn)
{
    $numOfArgs = 0;

    if (is_array($fn))
        $numOfArgs = (new \ReflectionMethod($fn[0], $fn[1]))->getNumberOfRequiredParameters();
    else if (\is_string($fn) && count($fnArr = \explode("::", $fn)) === 2)
        $numOfArgs = (new \ReflectionMethod($fnArr[0], $fnArr[1]))->getNumberOfRequiredParameters();
    else
        $numOfArgs = (new \ReflectionFunction($fn))->getNumberOfRequiredParameters();

    $inner = function ($args) use ($numOfArgs, &$inner, $fn) {
        return function ($arg = null) use ($numOfArgs, &$inner, $fn, $args) {

            if ($numOfArgs <= 0) return \call_user_func($fn);

            \array_push($args, $arg);

            if (count($args) < $numOfArgs)
                return \call_user_func_array($inner, [&$args]);
            else
                return \call_user_func_array($fn, $args);
        };
    };

    return $inner([]);
}
