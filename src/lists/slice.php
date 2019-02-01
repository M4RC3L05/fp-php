<?php

namespace FPPHP\Lists;

/**
 * 
 * slice: int -> int -> [x] -> [x]
 * 
 * Returns a new array from $from up to $to
 * 
 * @param int $from
 * @param int $to
 * @param array $list
 * @return array
 * 
 */
function slice(int $from)
{
    return function (int $to) use ($from) {
        return function (array $list) use ($to, $from) {
            return \array_slice($list, $from, $to - $from);
        };
    };
}
