<?php

namespace FPPHP\Lists;

/**
 * 
 * last: [x] -> x
 * 
 * Returns the last elemente of the array
 * 
 * @param array $list
 * @return mixed
 * 
 */
function last(array $arr)
{
    if (\count($arr) <= 0) return null;
    return head(reverse($arr));
}
