<?php

namespace FPPHP\Lists;

/**
 * 
 * all: (x -> bool) -> [x] -> bool
 * 
 * Returns true if all values of the array passes the perdicate
 * if not returns false
 * 
 * @param callable $perdicate
 * @param array $list
 * @return bool
 * 
 */
function all(callable $perdicate)
{
    return function (array $list) use ($perdicate) {

        foreach ($list as $key => $value) {
            if (!$perdicate($value, $key)) return false;
        }

        return true;
    };
}
