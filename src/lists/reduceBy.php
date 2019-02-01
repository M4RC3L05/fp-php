<?php

namespace FPPHP\Lists;

/**
 * 
 * reduceBy: ((x, y) -> x) -> x -> (y -> string) -> [y] -> [string => x]
 * 
 * Groups the elements by a key that returns by calling string returning
 * function and reduces the elements (same way the reduce)
 * 
 * @param callable $fn
 * @param mixed $init
 * @param callable $keyFn
 * @param array $list
 * @return array
 * 
 */
function reduceBy(callable $fn)
{
    return function ($init) use ($fn) {
        return function (callable $keyFn) use ($init, $fn) {
            return function (array $arr) use ($init, $fn, $keyFn) {
                return reduce(function ($acc, $curr) use ($keyFn, $fn, $init) {
                    $key = $keyFn($curr);
                    $acc[$key] = $fn((\array_key_exists($key, $acc) ? $acc[$key] : $init), $curr);
                    return $acc;
                })($init)($arr);
            };
        };
    };
}
