<?php

namespace FPPHP\Lists;

/**
 * 
 * remove: int -> int -> [x] -> [x]
 * 
 * Returns a new array less the slice from $from plus $count
 * 
 * @param int $from
 * @param int $count
 * @param array $list
 * @return array
 * 
 */
function remove(int $from)
{
    return function (int $count) use ($from) {
        return function (array $list) use ($from, $count) {
            $size = \count($list);

            if ($size <= 0) return [];

            $fromPositive = ($from < 0 ? $size + $from : $from);

            if ($fromPositive > $size || $fromPositive < 0) return [];

            $tmpArr = \array_slice($list, 0);
            \array_splice($tmpArr, $fromPositive, $count);
            return $tmpArr;
        };
    };
}
