<?php

namespace FPPHP\Lists;

/**
 * 
 * unnest: [[x]] -> [x]
 * 
 * Returns a new array with one less level of nesting
 * 
 * @param array $list
 * @return array
 * 
 */
function unnest(array $arr)
{
    return chain(function ($x) {
        return $x;
    })($arr);
}
