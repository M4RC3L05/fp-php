<?php

namespace FPPHP\Lists;

/**
 * 
 * prepend: x -> [x] -> [x]
 * 
 * Returns a new array with the value at the start of the array
 * 
 * @param mixed $val
 * @param array $list
 * @return array
 * 
 */
function prepend($val)
{
    return function (array $list) use ($val) {
        return \array_merge([$val], $list);
    };
}
