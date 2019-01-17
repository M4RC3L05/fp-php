<?php

namespace FPPHP\Lists;

function listSort($fn)
{
    return function ($arr) use ($fn) {
        $tmpArr = [];

        for ($i = 0; $i < count($arr) - 1; $i += 2) {

            $res = \call_user_func_array($fn, [&$arr[$i], &$arr[$i + 1]]);

            if ($res > 0) {
                \array_push($tmpArr, $arr[$i + 1]);
                \array_push($tmpArr, $arr[$i]);
            } else if ($res < 0) {
                \array_push($tmpArr, $arr[$i]);
                \array_push($tmpArr, $arr[$i + 1]);
            } else {
                \array_push($tmpArr, $arr[$i]);
                \array_push($tmpArr, $arr[$i + 1]);
            }
        }

        return $tmpArr;
    };
}
