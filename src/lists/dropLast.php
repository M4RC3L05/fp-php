<?php

namespace FPPHP\Lists;

/**
 * 
 * dropLast: int -> [x] -> [x]
 * 
 * Returns a new array less the last n elements
 * 
 * @param int $dropNum
 * @param array $list
 * @return array
 * 
 */
function dropLast(int $dropNum)
{
    return function (array $list) use ($dropNum) {

        if ($dropNum < 0) return \array_slice($list, 0);

        if ($dropNum >= \count($list)) return [];

        return take(\count($list) - $dropNum)($list);
    };
}
