<?php

namespace FPPHP\Lists;

function every($condition)
{
    return function ($iterable) use ($condition) {
        $tmp = false;


        foreach ($iterable as $key => $value) {
            $tmp = \call_user_func_array($condition, [&$value, &$key]);
        }

        return $tmp;
    };
}
