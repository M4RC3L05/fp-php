<?php

namespace FPPHP\Lists;

/**
 * 
 * lastIndexOf: [x] -> int
 * 
 * Returns the last index of a given value
 * 
 * @param mixed $value
 * @param array $list
 * @return int
 * 
 */
function lastIndexOf($value)
{
    return function (array $arr) use ($value) {
        return indexOf($value)(\array_reverse($arr, true));
    };
}
