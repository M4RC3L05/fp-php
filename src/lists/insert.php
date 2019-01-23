<?php

namespace FPPHP\Lists;

function insert(int $pos)
{
    return function ($val) use ($pos) {
        return function (array $arr) use ($val, $pos) {
            $tmpArr = [];

            foreach ($arr as $k => $x) {
                if ($k + 1 === $pos) {
                    \array_push($tmpArr, $x);
                    \array_push($tmpArr, $val);
                } else {
                    \array_push($tmpArr, $x);
                }
            }

            return $tmpArr;
        };
    };
}
