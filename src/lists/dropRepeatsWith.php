<?php

namespace FPPHP\Lists;

function dropRepeatsWith(callable $perdicate)
{
    return function (array $arr) use ($perdicate) {
        $tmpArr = [];
        $loopArr = \array_slice($arr, 0);
        $isAssoc = \array_values($arr) !== $arr;
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
