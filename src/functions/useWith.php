<?php

namespace FPPHP\Functions;

use function FPPHP\Lists\map;


function useWith(callable $fn)
{
    return function (array $trasformers) use ($fn) {
        return curryN((new \ReflectionFunction(\Closure::fromCallable($fn)))->getNumberOfParameters())(function (...$args) use ($trasformers, $fn) {
            foreach ($args as $key => $value) {
                $args[$key] = $trasformers[$key]($value);
            }

            return $fn(...$args);
        });
    };
}
