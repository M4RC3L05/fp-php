<?php

namespace FPPHP\Lists;

use function FPPHP\utils\isAssoc;

/**
 * 
 * dropLastWhile: (x -> bool) -> [x] -> [x]
 * 
 * Returns a new array less the last n elements satisfy with 
 * the perdicate 
 * 
 * @param callable $perdicate
 * @param int $dropNum
 * @param array $list
 * @return array
 * 
 */
function dropLastWhile(callable $perdicate)
{
    return function (array $arr) use ($perdicate) {

        $isAssoc = isAssoc($arr);

        $arrToTraverse = reverse($arr);

        $i = 0;

        foreach ($arrToTraverse as $key => $value) {
            if (!$perdicate($value, $key)) {
                if ($isAssoc) return take(\count($arr) - $i)($arr);
                else return take(\count($arr) - $key)($arr);
            }

            if ($isAssoc) $i += 1;
        }

        return \array_slice($arr, 0);
    };
}
