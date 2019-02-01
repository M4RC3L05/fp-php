<?php

namespace FPPHP\Lists;

/**
 * 
 * move: int -> int -> [x] ->  [x]
 * 
 * Moves the item at index from to index to
 * 
 * @param int $from
 * @param int $to
 * @param array $list
 * @return array
 * 
 */
function move(int $from)
{
    return function (int $to) use ($from) {
        return function (array $list) use ($from, $to) {
            $size = \count($list);

            if ($size <= 0) return $list;

            $tmpArr = \array_slice($list, 0);

            $f = ($from < 0 ? $size + $from : $from);
            $t = ($to < 0 ? $size + $to : $to);

            if ($f >= $size || $f < 0 || $t >= $size || $t < 0) return $arr;

            $val1 = \array_splice($tmpArr, $f, 1);

            $s1 = \array_slice($tmpArr, 0, $t);
            $s2 = \array_slice($tmpArr, $t);

            return \array_merge($s1, $val1, $s2);
        };
    };
}
