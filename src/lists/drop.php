<?php

namespace FPPHP\Lists;

/**
 * 
 * drop: int -> [x] -> [x]
 * 
 * Returns a new array less the elemets up to a given index
 * 
 * @param int $dropNum
 * @param array $list
 * @return array
 * 
 */
function drop(int $dropNum)
{
    return function (array $list) use ($dropNum) {

        if ($dropNum < 0) return \array_slice($list, 0);

        if ($dropNum >= \count($list)) return [];

        return takeLast(\count($list) - $dropNum)($list);
    };
}
