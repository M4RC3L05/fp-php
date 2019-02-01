<?php

namespace FPPHP\Lists;

use function FPPHP\utils\isAssoc;

/**
 * 
 * uniqWith: ((x, x)) -> bool) -> [x] -> [x]
 * 
 * Returns a new array containing only one of each values based on 
 * the value provided by calling the perdicate with 2 values
 * 
 * @param callable $perdicate
 * @param array $list
 * @return array
 * 
 */
function uniqWith(callable $perdicate)
{
    return function (array $list) use ($perdicate) {
        $tmpArr = [];
        $values = [];
        $isAssoc = isAssoc($list);

        foreach ($list as $key => $value) {

            $inArr = false;

            for ($i = 0; $i < count($tmpArr); $i++) {
                if (!$perdicate($value, $values[$i])) continue;

                $inArr = true;
                break;
            }

            if ($inArr) continue;

            if ($isAssoc) {
                $tmpArr[$key] = $value;
            } else {
                \array_push($tmpArr, $value);
            }

            \array_push($values, $value);
        }

        return $tmpArr;
    };
}
