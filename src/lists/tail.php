<?php

namespace FPPHP\Lists;

use function FPPHP\Functions\compose;
use function FPPHP\Lists\takeLast;

/**
 * 
 * tail: [x] -> [x]
 * 
 * Returns all but the first element of the array
 * 
 * @param array $list
 * @return array
 * 
 */
function tail(array $list)
{
    if (count($list) <= 0) return [];
    return takeLast(count($list) - 1)($list);
}
