<?php

namespace FPPHP\Lists;

/**
 * 
 * head: [x] -> x
 * 
 * Return the first element of the array
 * 
 * @param array $list
 * @return mixed
 * 
 */
function head(array $list)
{
    if (count($list) <= 0) return null;

    return \array_values($list)[0];
}


