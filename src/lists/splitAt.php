<?php

namespace FPPHP\Lists;

function splitAt($num)
{
    return function ($arr) use ($num) {
        if (count($arr) <= 0) return [];

        $positiveNum = ($num < 0 ? \count($arr) + $num : $num);
        $values = \array_values($arr);
        $curr = 0;

        $arr1 = \array_slice($arr, 0, $positiveNum);
        $arr2 = \array_slice($arr, $positiveNum);

        return [$arr1, $arr2];
    };
}
