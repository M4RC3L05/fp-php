<?php

namespace FPPHP\Lists;

/**
 * 
 * takeLast: int -> [x] -> [x]
 * 
 * Returns a new array from the last n elements
 * 
 * @param int $num
 * @param array $list
 * @return array
 * 
 */
function takeLast(int $num)
{
    return function (array $list) use ($num) {
        if ($num < 0) return [];

        if ($num >= \count($list)) return \array_slice($list, 0);

        return \array_slice($list, count($list) - $num);
    };
}
