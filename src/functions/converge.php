<?php

namespace FPPHP\Functions;

use function FPPHP\Lists\map;

/**
 * 
 * constructN: int -> (* -> {*}) -> (* -> {*})
 * 
 * return the result of calling the args on the functions passes
 * on the array and the call the converger function with those
 * results
 * 
 * @param callable $converger
 * @param array $fns
 * @return mixed
 * 
 */
function converge(callable $converger)
{
    return function (array $fns) use ($converger) {
        $toArities = map(function ($fn) {
            return (new \ReflectionFunction($fn))->getNumberOfParameters();
        })($fns);
        $numArgs = \max($toArities);
        $args = [];

        $inner = function ($x) use ($numArgs, &$args, &$inner, $converger, $fns) {
            \array_push($args, $x);

            if (\count($args) < $numArgs) return $inner;

            $toRes = map(function ($fn) use ($args) {
                return $fn(...$args);
            })($fns);

            return $converger(...$toRes);
        };

        return $inner;
    };
}
        