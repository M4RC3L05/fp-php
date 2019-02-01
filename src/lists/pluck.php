<?php

namespace FPPHP\Lists;

use function FPPHP\utils\isAssoc;

/**
 * 
 * pluck: x -> [x => y] -> [y]
 * pluck: x -> [[x], [x]] -> [x]
 * 
 * Returns an array with 2 arrays in wich, the first array contains
 * the values that matches the perdicate, and the second one, the
 * values that dont
 * 
 * @param mixed $index
 * @param array $list
 * @return array
 * 
 */
function pluck($index)
{
    return function (array $list) use ($index) {
        $isAssoc = isAssoc($list);

        $tmpArr = [];

        foreach ($list as $key => $value) {
            $toArr = (array)$value;

            if ($isAssoc) {
                if (\array_key_exists($index, $toArr))
                    $tmpArr[$key] = $toArr[$index];
                else
                    $tmpArr[$key] = null;
            } else {
                if (\array_key_exists($index, $toArr))
                    \array_push($tmpArr, $toArr[$index]);
                else
                    \array_push($tmpArr, null);
            }
        }

        return $tmpArr;
    };
}
