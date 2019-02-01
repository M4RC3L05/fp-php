<?php

namespace FPPHP\Lists;

use function FPPHP\Functions\pipe;

/**
 * 
 * zipAssoc: [x] -> [y] [x => y]
 * 
 * Returns a new associative array by alist of keys and a list
 * of values
 * 
 * @param array $list1
 * @param array $list2
 * @return array
 * 
 */
function zipAssoc(array $list1)
{
    return pipe(zip($list1), "FPPHP\\Lists\\fromPairs");
}
