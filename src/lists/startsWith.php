<?php

namespace FPPHP\Lists;

/**
 * 
 * startsWith: [x] -> [x] -> bool
 * 
 * Check if a given array starts with the values of the sublist.
 * 
 * @param array $list1
 * @param array $list2
 * @return bool
 * 
 */
function startsWith(array $list1)
{
    return function (array $list2) use ($list1) {
        if (count($list1) <= 0 || \count($list2) <= 0) return false;

        return \array_slice($list1, 0, 1) === \array_slice($list2, 0, 1);
    };
}
