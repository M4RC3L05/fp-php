<?php

namespace FPPHP\Lists;

function move($from)
{
    return function ($to) use ($from) {
        return function ($arr) use ($from, $to) {



            $tmpArr = \array_slice($arr, 0);

            $f = ($from < 0 ? \count($arr) + $from : $from);
            $t = ($to < 0 ? count($arr) + $to : $to);

            if ($from >= \count($arr) || $to >= \count($arr)) return $arr;

            $val1 = \array_splice($tmpArr, $f, 1);

            $s1 = \array_slice($tmpArr, 0, $t);
            $s2 = \array_slice($tmpArr, $t);

            return \array_merge($s1, $val1, $s2);
        };
    };
}
