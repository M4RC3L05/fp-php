<?php

namespace FPPHP\Lists;

/**
 * 
 * findLast: (x -> bool) -> [x] -> x
 * 
 * Returns the last value that matches the perdicate
 * 
 * @param callable $perdicate
 * @param array $list
 * @return mixed
 * 
 */
function findLast(callable $perdicate)
{
    return function (array $list) use ($perdicate) {
        foreach (reverse($list) as $key => $value) {
            if ($perdicate($value, $key)) return $value;
        }

        return null;
    };
}
