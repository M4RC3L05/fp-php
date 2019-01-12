<?php

namespace FPPHP\Lists;

function groupBy($fn)
{
    return function ($arr) use ($fn) {
        $tmpArr = [];

        foreach ($arr as $k => $x) {
            $key = \call_user_func_array($fn, [&$x]);
            \array_key_exists($key, $tmpArr) ? \array_push($tmpArr[$key], $x) : $tmpArr[$key] = [$x];
        }

        return $tmpArr;
    };
}
