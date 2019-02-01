<?php

namespace FPPHP\Lists;

/**
 * 
 * reduce: ((x, y) -> x) -> x -> [y] -> x
 * 
 * Reduces to a single item by applying the callable to every element
 * with the accumulator and the current value and passinc the result 
 * to the nest call
 * 
 * @param callable $fn
 * @param mixed $init
 * @param array $list
 * @return mixed
 * 
 */
function reduce(callable $fn)
{
    return function ($init) use ($fn) {
        return function (array $list) use ($fn, $init) {
            return \array_reduce($list, $fn, $init);
        };
    };
}
