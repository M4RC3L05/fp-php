<?php

namespace FPPHP\Lists;

/**
 * 
 * reduceWhile: ((x, y) -> bool) -> ((x, y) → x) → x → [y] → x
 * 
 * Reduces to a single value.
 * Takes a perdicate, that is called in each iteration and 
 * if return false, will return the current value of 
 * the accumulator
 * 
 * @param callable $fn
 * @param mixed $init
 * @param array $list
 * @return mixed
 * 
 */
function reduceWhile(callable $perdicate)
{
    return function (callable $fn) use ($perdicate) {
        return function ($acc) use ($fn, $perdicate) {
            return function (array $list) use ($fn, $perdicate, $acc) {
                return reduce(function ($acc, $curr) use ($perdicate, $fn) {
                    if ($perdicate($acc, $curr)) return $fn($acc, $curr);
                    return $acc;
                })($acc)($list);
            };
        };
    };
}
