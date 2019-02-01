<?php

namespace FPPHP\Lists;

/**
 * 
 * insertAll: int -> [x] -> [x] -> [x]
 * 
 * Returns a new array plus the values inserted at a given index
 * on the array
 * 
 * @param int $pos
 * @param array $values
 * @param array $list
 * @return array
 * 
 */
function insertAll(int $pos)
{
    return function (array $values) use ($pos) {
        return function (array $list) use ($pos, $values) {
            return insert($pos)($values)($list);
        };
    };
}
