<?php

namespace FPPHP\Lists;

/**
 * 
 * endsWith: [x] -> [x] -> bool
 * 
 * Returns true if a given array ends with the given values, 
 * else false
 * 
 * @param array $list1
 * @param array $list2
 * @return bool
 * 
 */
function endsWith(array $list1)
{
    return function (array $list2) use ($list1) {
        return $list1 === takeLast(\count($list1))($list2);
    };
}
