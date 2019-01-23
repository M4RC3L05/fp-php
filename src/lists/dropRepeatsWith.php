<?php

namespace FPPHP\Lists;

use function FPPHP\utils\isAssoc;


function dropRepeatsWith(callable $perdicate)
{
    return function (array $arr) use ($perdicate) {
        $tmpArr = [];
        $loopArr = \array_slice($arr, 0);
        $isAssoc = isAssoc($arr);
        $curr = \current($loopArr);

        foreach ($loopArr as $key => $value) {
            $next = next($loopArr);
            if (!$perdicate($value, $next)) {
                if ($isAssoc) {
                    $tmpArr[$key] = $curr;
                    $curr = $next;
                } else {
                    \array_push($tmpArr, $curr);
                    $curr = $next;
                }
            }


        }

        return $tmpArr;
    };
}
