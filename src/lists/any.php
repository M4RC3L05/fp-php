<?php

namespace FPPHP\Lists;

/**
 * 
 * any: (x -> bool) -> [x] -> bool
 * 
 * Returns true if any of the values of the array matches the perdicate
 * if not returns false
 * 
 * @param callable $perdicate
 * @param array $list
 * @return bool
 * 
 */
function any(callable $perdicate)
{
    return function (array $list) use ($perdicate) {

        foreach ($list as $key => $value) {
            if ($perdicate($value, $key)) return true;
        }

        return false;
    };
}
