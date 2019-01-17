<?php

namespace FPPHP\Lists;

function splitEvery($num)
{
    return function ($arr) use ($num) {
        if (count($arr) <= 0) return [];

        if ($num <= 0) return [];

        $tmpArr = [];
        $curr = 0;
        $len = count($arr);

        while ($curr < $len) {
            \array_push($tmpArr, \array_slice($arr, $curr, $num));
            $curr += $num;
        }

        return $tmpArr;
    };
}
