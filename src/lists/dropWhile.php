<?php

namespace FPPHP\Lists;

/**
 * 
 * dropWhile: (x -> bool) -> [x] -> [x]
 * 
 * Returns a new array less the elements that satesfies the perdicate
 * drops until ther perdicate returns true
 * 
 * @param callable $perdicate
 * @param array $list
 * @return array
 * 
 */
function dropWhile(callable $perdicate)
{
    return function (array $list) use ($perdicate) {
        $pos = 0;

        foreach ($list as $key => $value) {
            if (!$perdicate($value, $key)) return takeLast(\count($list) - $pos)($list);

            $pos += 1;
        }

        return [];
    };
}
