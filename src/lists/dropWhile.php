<?php

namespace FPPHP\Lists;

function dropWhile($perdicate)
{
    return function ($arr) use ($perdicate) {
        $pos = 0;

        foreach ($arr as $key => $value) {
            if (!\call_user_func_array($perdicate, [&$value, &$key])) return takeLast(\count($arr) - $pos)($arr);

            $pos += 1;
        }

        return [];
    };
}
