<?php

namespace FPPHP;

function curry($fn)
{
    $numOfArgs = (new ReflectionFunction($fn))
        ->getNumberOfParameters();
    $args = [];

    $inner = function ($arg = null) use ($numOfArgs, &$args, &$inner, $fn) {
        if ($numOfArgs <= 0) return $fn();

        array_push($args, $arg);


        if (count($args) < $numOfArgs)
            return $inner;
        else
            return $fn(...$args);
    };

    return $inner;
}
