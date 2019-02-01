<?php

namespace FPPHP\Lists;

/**
 * 
 * findIndex: (x -> bool) -> [x] -> int
 * 
 * Returns the index of the value that matches the perdicate
 * 
 * @param callable $perdicate
 * @param array $list
 * @return int
 * 
 */
function findIndex(callable $perdicate)
{
    return function (array $list) use ($perdicate) {
        foreach ($list as $key => $value) {
            if ($perdicate($value, $key)) return $key;
        }

        return -1;
    };
}
