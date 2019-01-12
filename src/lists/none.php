<?php

namespace FPPHP\Lists;

function none($perdicate)
{
    return function ($arr) use ($perdicate) {
        foreach ($arr as $key => $value) {
            if (\call_user_func_array($perdicate, [&$value, &$key])) return false;
        }

        return true;
    };
}
