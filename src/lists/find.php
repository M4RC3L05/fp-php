<?php

namespace FPPHP\Lists;

function find($perdicate)
{
    return function ($arr) use ($perdicate) {
        foreach ($arr as $key => $value) {
            if (\call_user_func_array($perdicate, [&$value, &$key])) return $value;
        }

        return null;
    };
}