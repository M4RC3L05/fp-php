<?php

namespace FPPHP\Lists;

use function FPPHP\utils\isAssoc;


/**
 * 
 * append: x -> [x] -> [x]
 * 
 * Appends a given item to the end of the array, if the list is 
 * and associative array the item must be an array [key => value]
 * 
 * @param mixed $item
 * @param array $list
 * @return array
 * 
 */
function append($item)
{
    return function (array $list) use ($item) {
        if (isAssoc($list)) return \array_merge($list, $item);
        return \array_merge($list, [$item]);
    };
}
