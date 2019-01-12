<?php

namespace FPPHP\Lists;

function into($acc)
{
    return function ($fn) use ($acc) {
        return function ($arr) use ($acc, $fn) {
            return \array_merge($acc, \call_user_func_array($fn, [&$arr]));
        };
    };
}
