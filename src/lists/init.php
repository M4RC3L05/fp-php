<?php

namespace FPPHP\Lists;

/**
 * 
 * init: [x] -> [x]
 * 
 * Returns a new array with all elements less the last one
 * 
 * @param array $list
 * @return array
 * 
 */
function init(array $list)
{
    return take(\count($list) - 1)($list);
}
