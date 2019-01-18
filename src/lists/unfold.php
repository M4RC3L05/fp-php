<?php

namespace FPPHP\Lists;

function unfold($iterFn)
{
    return function ($seed) use ($iterFn) {
        $tmpArr = [];
        $innerSeed = $seed;

        $res = null;

        while ($res = \call_user_func_array($iterFn, [&$innerSeed])) {
            \array_push($tmpArr, $res[0]);
            $innerSeed = $res[1];
        }

        return $tmpArr;
    };
}
