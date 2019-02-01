<?php

namespace FPPHP\Lists;

/**
 * 
 * splitEvery: int -> [x] -> [[x]]
 * 
 * Returns a new array with arrays with provided length
 * 
 * @param int $length
 * @param array $list
 * @return array
 * 
 */
function splitEvery(int $length)
{
    return function (array $list) use ($length) {
        if (count($list) <= 0) return [];

        if ($length <= 0) return [];

        $tmpArr = [];
        $curr = 0;
        $len = count($list);

        while ($curr < $len) {
            \array_push($tmpArr, \array_slice($list, $curr, $length));
            $curr += $length;
        }

        return $tmpArr;
    };
}
