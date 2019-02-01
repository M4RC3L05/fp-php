<?php

namespace FPPHP\Lists;

/**
 * 
 * zipWith: ((x, y) -> z) -> [x] -> [y] -> [z]
 * 
 * Returns a new array by calling a given function to each equaly
 * positional value of the two lists
 * 
 * @param callable $fn
 * @param array $list1
 * @param array $list2
 * @return array
 * 
 */
function zipWith(callable $fn)
{
    return function (array $list1) use ($fn) {
        return function (array $list2) use ($list1, $fn) {
            $tmpArr = [];

            $lenL1 = count($list1);
            $lenL2 = count($list2);
            $arrMin = \min($list1, $lenL2);

            $curr = 0;
            $arrV = \array_values($list2);

            foreach ($list1 as $key => $value) {

                if ($curr >= $arrMin) break;

                \array_push($tmpArr, $fn($value, $arrV[$curr]));

                $curr += 1;
            }

            return $tmpArr;
        };
    };
}
