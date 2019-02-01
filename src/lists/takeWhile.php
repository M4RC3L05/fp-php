<?php

namespace FPPHP\Lists;

/**
 * 
 * takeWhile: (x -> bool) -> [x] -> [x]
 * 
 * Returns a new array by taking the elements until the perdicate 
 * returns false
 * 
 * @param callable $perdicate
 * @param array $list
 * @return array
 * 
 */
function takeWhile(callable $perdicate)
{
    return function (array $list) use ($perdicate) {
        $spliAt = 0;

        foreach ($list as $key => $value) {
            if (!$perdicate($value)) break;

            $spliAt += 1;
        }

        return \array_splice($list, 0, $spliAt);
    };
}
