<?php

namespace FPPHP\Lists;

/**
 * 
 * nth: int -> [x] -> x
 * 
 * Returns the nth value especified by the the $pos
 * 
 * @param int $pos
 * @param array $list
 * @return mixed
 * 
 */
function nth(int $pos)
{
    return function (array $list) use ($pos) {
        $size = \count($list);

        if ($size <= 0) return null;

        $positivePos = ($pos < 0 ? $size + $pos : $pos);

        if ($positivePos >= $size || $positivePos < 0) return null;

        return \array_values($list)[$positivePos];
    };
}
