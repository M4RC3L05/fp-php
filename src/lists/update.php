<?php

namespace FPPHP\Lists;

use function FPPHP\utils\isAssoc;

/**
 * 
 * update: i -> x -> [x] -> [x]
 * 
 * Returns a new array with the element at index $updatePos updated
 * to the provided value
 * 
 * @param mixed $updatePos
 * @param mixed $value
 * @param array $list
 * @return array
 * 
 */
function update($updatePos)
{
    return function ($value) use ($updatePos) {
        return function (array $list) use ($value, $updatePos) {
            $isAssoc = isAssoc($list);

            if ($isAssoc) {

                if (!\array_key_exists($updatePos, $list)) return $list;

                $tmpArr = \array_slice($list, 0);
                $tmpArr[$updatePos] = $value;
                return $tmpArr;
            } else {
                $arrValues = \array_values($list);

                $positivePos = ($updatePos < 0 ? \count($arrValues) + $updatePos : $updatePos);

                if ($positivePos < 0 || $positivePos > \count($list)) return $list;

                $arrValues[$positivePos] = $value;

                return $arrValues;
            }
        };
    };
}
