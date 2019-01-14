<?php

namespace FPPHP\Lists;

function reject($perdicate)
{
    return function ($arr) use ($perdicate) {
        return filter(function ($x, $y) use ($perdicate) {
            return !\call_user_func_array($perdicate, [&$x, &$y]);
        })($arr);
    };
}
