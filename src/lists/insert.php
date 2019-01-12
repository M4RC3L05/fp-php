<?php

namespace FPPHP\Lists;

function insert($pos)
{
    return function ($val) use ($pos) {
        return function ($arr) use ($val, $pos) {
            $tmpArr = [];

            forEvery(function ($x, $k) use (&$val, $pos, &$tmpArr) {
                if ($k + 1 === $pos) {
                    \array_push($tmpArr, $x);
                    \array_push($tmpArr, $val);
                } else {
                    \array_push($tmpArr, $x);
                }
            })($arr);

            return $tmpArr;
        };
    };
}
