<?php

namespace FPPHP\Lists;

use function FPPHP\utils\isAssoc;

/**
 * 
 * uniqBy: (x -> y) -> [x] -> [x]
 * 
 * Returns a new array containing only one of each values based on 
 * the value provided by the function
 * 
 * @param callable $fn
 * @param array $list
 * @return array
 * 
 */
function uniqBy(callable $fn)
{
    return function (array $arr) use ($fn) {
        $tmpArr = [];
        $checkArr = [];
        $isAssoc = isAssoc($arr);


        foreach ($arr as $key => $value) {
            $valApplyed = $fn($value);

            if (\in_array($value, $checkArr, true)) continue;

            if ($isAssoc) {
                $tmpArr[$key] = $value;
                $checkArr[$key] = $valApplyed;
            } else {
                \array_push($tmpArr, $value);
                \array_push($checkArr, $valApplyed);
            }
        }

        return $tmpArr;
    };
}
