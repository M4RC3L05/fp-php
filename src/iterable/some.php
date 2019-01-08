<?php

namespace FPPHP\Iterable;

use function FPPHP\Utils\isIterable;


function some($condition)
{
    return function ($iterable) use ($condition) {
        foreach ($iterable as $k => $v)
            if (\call_user_func_array($condition, [&$v])) return true;

        return false;
    };
}
