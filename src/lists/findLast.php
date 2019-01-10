<?php

namespace FPPHP\Lists;

function findLast($perdicate)
{
    return function ($arr) use ($perdicate) {
        foreach (reverse()($arr) as $key => $value) {
            if (\call_user_func_array($perdicate, [&$value, &$key])) return $value;
        }

        return null;
    };
}
