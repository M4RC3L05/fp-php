<?php

namespace FPPHP\Lists;

use function FPPHP\utils\isAssoc;

/**
 * 
 * partition: (x -> bool) -> [x] -> [[x], [x]]
 * 
 * Returns an array with 2 arrays in wich, the first array contains
 * the values that matches the perdicate, and the second one, the
 * values that dont
 * 
 * @param callable $perdicate
 * @param array $list
 * @return array
 * 
 */
function partition(callable $perdicate)
{
    return function (array $list) use ($perdicate) {

        if (\count($list) <= 0) return [[], []];

        $isAssoc = isAssoc($list);

        $tmpArr = [[], []];

        foreach ($list as $k => $v) {
            if (\call_user_func_array($perdicate, [&$v, &$k])) {
                if ($isAssoc) {
                    $tmpArr[0][$k] = $v;
                } else {
                    \array_push($tmpArr[0], $v);
                }
            } else {
                if ($isAssoc) {
                    $tmpArr[1][$k] = $v;
                } else {
                    \array_push($tmpArr[1], $v);
                }
            }
        }

        return $tmpArr;
    };
}
