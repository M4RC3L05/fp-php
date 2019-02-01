<?php

namespace FPPHP\Lists;

use function FPPHP\utils\isAssoc;

/**
 * 
 * uniq: [x] -> [x]
 * 
 * Returns a new array containing only one of each values
 * 
 * @param array $list
 * @return array
 * 
 */
function uniq(array $list)
{
    $isAssoc = isAssoc($list);
    $tmpArr = [];

    foreach ($list as $key => $value) {
        if (\in_array($value, $tmpArr, true)) continue;

        if ($isAssoc) $tmpArr[$key] = $value;
        else \array_push($tmpArr, $value);
    }

    return $tmpArr;
}
