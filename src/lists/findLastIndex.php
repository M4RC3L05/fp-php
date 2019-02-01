<?php

namespace FPPHP\Lists;

/**
 * 
 * findLastIndex: (x -> bool) -> [x] -> int
 * 
 * Returns the index of the last value that matches the perdicate
 * 
 * @param callable $perdicate
 * @param array $list
 * @return int
 * 
 */
function findLastIndex(callable $perdicate)
{
    return function (array $arr) use ($perdicate) {
        foreach (reverse($arr) as $key => $value) {
            if ($perdicate($value, $key)) return $key;
        }

        return -1;
    };
}
