<?php

namespace FPPHP\Lists;

/**
 * 
 * indexOf: x -> [x] -> int | string
 * 
 * Returns the index of the given value on the array
 * 
 * @param mixed $value
 * @param array $list
 * @return int|string
 * 
 */
function indexOf($value)
{
    return function (array $list) use ($value) {
        foreach ($list as $key => $v) {
            if ($v === $value) return $key;
        }

        return -1;
    };
}
