<?php

namespace FPPHP\Lists;

/**
 * 
 * listSort: (x -> int) -> [x] -> [x]
 * 
 * Returns a new array sorted by the function provided (-1, 0, 1)
 * 
 * @param callable $fn
 * @param array $list
 * @return array
 * 
 */
function listSort(callable $fn)
{
    return function (array $list) use ($fn) {
        $tmpArr = \array_slice($list, 0);
        \usort($tmpArr, $fn);
        return $tmpArr;
    };
}
