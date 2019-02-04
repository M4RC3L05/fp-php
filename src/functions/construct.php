<?php

namespace FPPHP\Functions;

/**
 * 
 * construct: (* -> {*}) -> (* -> {*})
 * 
 * Curries the __construct function
 * 
 * @param string $className
 * @return callable
 * 
 */
function construct(string $className)
{
    $numArgs = (new \ReflectionMethod($className, "__construct"))->getNumberOfParameters();
    $args = [];

    $inner = function ($x) use ($numArgs, &$args, &$inner, $className) {
        \array_push($args, $x);

        if (\count($args) < $numArgs) return $inner;

        return new $className(...$args);
    };

    return $inner;
}
        