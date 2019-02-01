<?php

namespace FPPHP\Lists;

/**
 * 
 * concat: [x] -> [x] -> [x]
 * 
 * Merges 2 arrays in a new one, uses array_merge
 * 
 * @param array $list1
 * @param array $list2
 * @return array
 * 
 */
function concat(array $list1)
{
    return function (array $list2) use ($list1) {
        return \array_merge($list1, $list2);
    };
}
