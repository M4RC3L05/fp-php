<?php

namespace FPPHP\Lists;

/**
 * 
 * take: int -> [x] -> [x]
 * 
 * Returns a new array from the first n elements
 * 
 * @param int $num
 * @param array $list
 * @return array
 * 
 */
function take(int $num)
{
    return function (array $list) use ($num) {
        if ($num < 0) return [];

        if ($num > \count($list)) return \array_slice($list, 0);

        return \array_slice($list, 0, $num, true);
    };
}
