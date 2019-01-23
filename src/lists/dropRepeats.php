<?php

namespace FPPHP\Lists;

use function FPPHP\utils\isAssoc;


function dropRepeats(array $arr)
{
    $tmpArr = [];
    $loopArr = \array_slice($arr, 0);
    $isAssoc = isAssoc($loopArr);

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
