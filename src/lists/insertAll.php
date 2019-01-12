<?php

namespace FPPHP\Lists;

function insertAll($pos)
{
    return function ($arr1) use ($pos) {
        return function ($arr2) use ($pos, $arr1) {

            $tmpArr = [];

            forEvery(function ($x, $k) use ($arr1, $pos, &$tmpArr) {
                if ($k + 1 === $pos) {
                    \array_push($tmpArr, $x);
                    forEvery(function ($x, $y) use (&$tmpArr) {
                        \array_push($tmpArr, $x);
                    })($arr1);
                } else {
                    \array_push($tmpArr, $x);
                }
            })($arr2);

            return $tmpArr;
        };
    };
}
