<?php

namespace FPPHP\Lists;

use function FPPHP\utils\isAssoc;

/**
 * 
 * dropRepeatsWith: (x -> x -> bool) -> [x] -> [x]
 * 
 * Returns a new array without concecutive duplicated elements,
 * applying the given perdicate to 2 consecutive elements
 * 
 * @param callable $perdicate
 * @param array $list
 * @return array
 * 
 */
function dropRepeatsWith(callable $perdicate)
{
    return function (array $list) use ($perdicate) {
        $tmpArr = [];
        $loopArr = \array_slice($list, 0);
        $isAssoc = isAssoc($list);
        $curr = \current($loopArr);

        foreach ($loopArr as $key => $value) {
            $next = next($loopArr);
            if (!$perdicate($value, $next)) {
                if ($isAssoc) {
                    $tmpArr[$key] = $curr;
                } else {
                    \array_push($tmpArr, $curr);
                }

                $curr = $next;
            }
        }

        return $tmpArr;
    };
}
