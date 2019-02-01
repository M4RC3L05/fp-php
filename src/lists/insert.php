<?php

namespace FPPHP\Lists;

/**
 * 
 * insert: int -> x -> [x] -> [x]
 * 
 * Returns a new array plus the value tha is inserted on
 * a given index
 * 
 * @param int $pos
 * @param mixed $value
 * @param array $list
 * @return array
 * 
 */
function insert(int $pos)
{
    return function ($value) use ($pos) {
        return function (array $list) use ($value, $pos) {

            $size = \count($list);
            $pos = ($pos >= 0 && $pos < $size ? $pos : $size);
            $tmp = \array_slice($list, 0);
            array_splice($tmp, $pos, 0, $value);
            return $tmp;
        };
    };
}
