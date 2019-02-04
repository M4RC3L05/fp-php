<?php

namespace FPPHP\Lists;

/**
 * 
 * listSort: ((x, x) -> int) -> [x] -> [x]
 * 
 * Sorts a array by a given sort function
 * 
 * @param callable $sortFn
 * @param array $list
 * @return array
 * 
 */
function listSort(callable $sortFn)
{
    return function (array $list) use ($sortFn) {
        $tmpArr = \array_slice($list, 0);
        \usort($tmpArr, $sortFn);
        return $tmpArr;
    };
}
        