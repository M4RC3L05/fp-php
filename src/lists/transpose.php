<?php

namespace FPPHP\Lists;

/**
 * 
 * transpose: [[x]] -> [[x]]
 * 
 * Trasnform a list nxm -> mxn (2x3 -> 3x2)
 * 
 * @param array $list
 * @return array
 * 
 */
function transpose(array $list)
{
    $tmpArr = [];

    for ($line = 0; $line < \count($list); $line++) {
        $innerList = \array_values($list[$line]);

        for ($col = 0; $col < \count($list[$line]); $col++) {
            if (!\array_key_exists($col, $tmpArr)) \array_push($tmpArr, []);

            \array_push($tmpArr[$col], $innerList[$col]);
        }
    }

    return $tmpArr;
}
