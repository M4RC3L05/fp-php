<?php

namespace FPPHP\Lists;

function transpose($arr)
{
    $tmpArr = [];

    for ($line = 0; $line < \count($arr); $line++) {

        for ($col = 0; $col < \count($arr[$line]); $col++) {
            if (!\array_key_exists($col, $tmpArr)) \array_push($tmpArr, []);

            \array_push($tmpArr[$col], $arr[$line][$col]);
        }
    }

    return $tmpArr;
}
