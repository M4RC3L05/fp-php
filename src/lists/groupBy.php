<?php

namespace FPPHP\Lists;

function groupBy($fn)
{
    return function ($arr) use ($fn) {
        $tmpArr = [];

        forEvery(function ($x) use (&$tmpArr, &$fn) {
            $key = \call_user_func_array($fn, [&$x]);
            \array_key_exists($key, $tmpArr) ? \array_push($tmpArr[$key], $x) : $tmpArr[$key] = [$x];
        })($arr);

        return $tmpArr;
    };
}
