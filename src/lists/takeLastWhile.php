<?php

namespace FPPHP\Lists;

/**
 * 
 * takeLastWhile: (x -> bool) -> [x] -> [x]
 * 
 * Returns a new array by taking the elements, starting from the end,
 * until the perdicate returns false
 * 
 * @param callable $perdicate
 * @param array $list
 * @return array
 * 
 */
function takeLastWhile(callable $perdicate)
{
    return function (array $list) use ($perdicate) {
        $fromAt = 0;

        foreach (\array_reverse($list) as $key => $value) {
            if (!$perdicate($value)) break;

            $fromAt += 1;
        }

        return \array_slice($list, \count($list) - $fromAt);
    };
}
