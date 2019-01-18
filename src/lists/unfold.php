<?php

namespace FPPHP\Lists;

function unfold(callable $iterFn)
{
    return function ($seed) use ($iterFn) {
        $tmpArr = [];
        $innerSeed = $seed;

        $res = null;

        while ($res = $iterFn($innerSeed)) {
            \array_push($tmpArr, $res[0]);
            $innerSeed = $res[1];
        }

        return $tmpArr;
    };
}
