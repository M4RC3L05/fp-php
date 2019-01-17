<?php

namespace FPPHP\Lists;

function times($fn)
{
    return function ($times) use ($fn) {
        $tmpArr = [];
        $prev = 0;
        $prevRes = 0;

        for ($i = 0; $i < $times; $i++) {
            \array_push($tmpArr, \call_user_func_array($fn, [$prev]));
            $prev += 1;
        }

        return $tmpArr;
    };
}
