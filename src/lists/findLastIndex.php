<?php

namespace FPPHP\Lists;

function findLastIndex($perdicate)
{
    return function ($arr) use ($perdicate) {
        foreach (reverse()($arr) as $key => $value) {
            if (\call_user_func_array($perdicate, [&$value, &$key])) return $key;
        }

        return -1;
    };
}
