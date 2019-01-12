<?php

namespace FPPHP\Lists;

function move($from)
{
    return function ($to) use ($from) {
        return function ($arr) use ($from, $to) {
            if (count($arr) <= 0) return $arr;

            $tmpArr = \array_slice($arr, 0);

            $f = ($from < 0 ? \count($arr) + $from : $from);
            $t = ($to < 0 ? count($arr) + $to : $to);

            if ($f >= \count($arr) || $f < 0 || $t >= \count($arr) || $t < 0) return $arr;

            $val1 = \array_splice($tmpArr, $f, 1);

            $s1 = \array_slice($tmpArr, 0, $t);
            $s2 = \array_slice($tmpArr, $t);

            return \array_merge($s1, $val1, $s2);
        };
    };
}
