<?php

namespace FPPHP\Lists;

use function FPPHP\utils\isAssoc;

/**
 * 
 * dropRepeats: [x] -> [x]
 * 
 * Returns a new array without concecutive duplicated elements
 * 
 * @param array $list
 * @return array
 * 
 */
function dropRepeats(array $list)
{
    $tmpArr = [];
    $loopArr = \array_slice($list, 0);
    $isAssoc = isAssoc($loopArr);

    foreach ($list as $key => $value) {
        if ($value !== next($loopArr)) {
            if ($isAssoc) {
                $tmpArr[$key] = $value;
            } else {
                \array_push($tmpArr, $value);
            }
        }
    }

    return $tmpArr;
}
