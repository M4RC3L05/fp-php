<?php

namespace FPPHP\Lists;

use function FPPHP\utils\isAssoc;

/**
 * 
 * flatten: [[x]] -> [x]
 * 
 * Returns new array with depth of one
 * 
 * @param array $list
 * @return array
 * 
 */
function flatten(array $list)
{
    if (\count($list) <= 0) return [];

    $isAssoc = isAssoc($list);
    $tmp = [];
    array_walk_recursive($list, function ($v, $k) use (&$tmp, $isAssoc) {
        if ($isAssoc) $tmp[$k] = $v;
        else $tmp[] = $v;
    });
    return $tmp;
}
