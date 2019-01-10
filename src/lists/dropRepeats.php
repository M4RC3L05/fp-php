<?php

namespace FPPHP\Lists;

function dropRepeats($arr)
{
    $tmpArr = [];
    $loopArr = \array_slice($arr, 0);
    $isAssoc = \array_values($loopArr) !== $loopArr;

    foreach ($arr as $key => $value) {
        if ($value !== next($loopArr)) {
            if ($isAssoc) {
                $tmpArr[$key] = $value;
            } else {
                \array_push($tmpArr, $value);
            }
        }
    }

    return $tmpArr;
}
