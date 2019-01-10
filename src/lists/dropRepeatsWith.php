<?php

namespace FPPHP\Lists;

function dropRepeatsWith($perdicate)
{
    return function ($arr) use ($perdicate) {
        $tmpArr = [];
        $loopArr = \array_slice($arr, 0);
        $isAssoc = \array_values($arr) !== $arr;
        $curr = \current($loopArr);

        foreach ($loopArr as $key => $value) {
            $next = next($loopArr);
            if (!\call_user_func_array($perdicate, [&$value, &$next])) {
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
