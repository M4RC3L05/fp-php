<?php

namespace FPPHP\Lists;

/**
 * 
 * reject: (x -> bool) -> [x] -> [x]
 * 
 * Returns a new array less the elements that matches the perdicate.
 * The inverse of filter
 * 
 * @param callable $perdicate
 * @param array $list
 * @return array
 * 
 */
function reject(callable $perdicate)
{
    return function (array $list) use ($perdicate) {
        return filter(function ($x, $y) use ($perdicate) {
            return !$perdicate($x, $y);
        })($list);
    };
}
