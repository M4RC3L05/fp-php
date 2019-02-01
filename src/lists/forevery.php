<?php

namespace FPPHP\Lists;

/**
 * 
 * forEvery: (x -> *) -> [x] -> [x]
 * 
 * Iterates over an array and call the provided function on
 * each element, returs the array
 * 
 * @param callable $fn
 * @param iterable $list
 * @return array
 * 
 */
function forEvery(callable $fn)
{
    return function (iterable $list) use ($fn) {
        foreach ($list as $k => $v)
            $fn($v, $k);

        return $list;
    };
}
