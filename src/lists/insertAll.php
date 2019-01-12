<?php

namespace FPPHP\Lists;

function insertAll($pos)
{
    return function ($arr1) use ($pos) {
        return function ($arr2) use ($pos, $arr1) {

            $tmpArr = [];

            foreach ($arr2 as $k => $x) {
                if ($k + 1 === $pos) {
                    \array_push($tmpArr, $x);
                    foreach ($arr1 as $k => $x) {
                        \array_push($tmpArr, $x);
                    }
                } else {
                    \array_push($tmpArr, $x);
                }
            }

            return $tmpArr;
        };
    };
}