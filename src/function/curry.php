<?php

namespace FPPHP\Funtion;

function curry($fn)
{
    if (\is_null($fn) || !\is_callable($fn)) throw new \Exception("No function provided");

    $numOfArgs = 0;

    if (is_array($fn))
        $numOfArgs = (new \ReflectionMethod($fn[0], $fn[1]))->getNumberOfParameters();
    else if (\is_string($fn) && count($fnArr = \explode("::", $fn)) === 2)
        $numOfArgs = (new \ReflectionMethod($fnArr[0], $fnArr[1]))->getNumberOfParameters();
    else
        $numOfArgs = (new \ReflectionFunction($fn))->getNumberOfParameters();

    $inner = function ($args) use ($numOfArgs, &$inner, $fn) {
        return function ($arg = null) use ($numOfArgs, &$inner, $fn, $args) {

            if ($numOfArgs <= 0) return \call_user_func($fn);

            if (\is_null($arg) || !isset($arg)) throw new \Exception("No argument provided");

            \array_push($args, $arg);

            if (count($args) < $numOfArgs)
                return \call_user_func($inner, $args);
            else
                return \call_user_func($fn, ...$args);
        };
    };

    return $inner([]);
}
