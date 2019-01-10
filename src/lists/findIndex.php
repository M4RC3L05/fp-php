<?php

namespace FPPHP\Lists;

function findIndex($perdicate)
{
    return function ($arr) use ($perdicate) {
        foreach ($arr as $key => $value) {
            if (\call_user_func_array($perdicate, [&$value, &$key])) return $key;
        }

        return -1;
    };
}
