<?php

namespace FPPHP\Lists;

/**
 * 
 * splitAt: int -> [x] -> [[x], [x]]
 * 
 * Returns a new array splited at the given index
 * 
 * @param int $index
 * @param array $list
 * @return array
 * 
 */
function splitAt(int $index)
{
    return function (array $list) use ($index) {
        if (count($list) <= 0) return [];

        $positiveNum = ($index < 0 ? \count($list) + $index : $index);
        $values = \array_values($list);
        $curr = 0;

        $arr1 = \array_slice($list, 0, $positiveNum);
        $arr2 = \array_slice($list, $positiveNum);

        return [$arr1, $arr2];
    };
}
