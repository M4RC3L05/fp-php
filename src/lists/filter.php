<?php

namespace FPPHP\Lists;

use function FPPHP\utils\isAssoc;

/**
 * 
 * filter: (x -> bool) -> [x] -> [x]
 * 
 * Returns new array with the elements that match the perdicate 
 * 
 * @param callable $perdicate
 * @param array $list
 * @return array
 * 
 */
function filter(callable $perdicate)
{
    return function (array $list) use ($perdicate) {
        $isAssoc = isAssoc($list);
        $tmpArr = [];

        foreach ($list as $key => $value) {
            if ($perdicate($value, $key)) {
                if ($isAssoc) {
                    $tmpArr[$key] = $value;
                } else {
                    \array_push($tmpArr, $value);
                }
            }
        }

        return $tmpArr;
    };
}
