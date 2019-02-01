<?php

namespace FPPHP\Lists;

/**
 * 
 * map: (x -> y) -> [x] -> [y]
 * 
 * Returns a new array in wich each value is the result of applying
 * the provided function to each elemente
 * 
 * @param callable $fn
 * @param array $list
 * @return array
 * 
 */
function map(callable $fn)
{
    return function (array $list) use ($fn) {
        return \array_map($fn, $list);
    };
}
