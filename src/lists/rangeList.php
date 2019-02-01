<?php

namespace FPPHP\Lists;

/**
 * 
 * rangeList: int -> int -> [int]
 * 
 * Returns a new array with from $from to $to
 * 
 * @param int $from
 * @param int $to
 * @return array
 * 
 */
function rangeList(int $from)
{
    return function (int $to) use ($from) {
        return \range($from, $to);
    };
}
