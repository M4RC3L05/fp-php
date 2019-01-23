<?php

namespace FPPHP\Lists;

function groupBy(callable $fn)
{
    return function (array $arr) use ($fn) {
        $tmpArr = [];

        foreach ($arr as $k => $x) {
            $key = $fn($x);
            \array_key_exists($key, $tmpArr) ? \array_push($tmpArr[$key], $x) : $tmpArr[$key] = [$x];
        }

        return $tmpArr;
    };
}
