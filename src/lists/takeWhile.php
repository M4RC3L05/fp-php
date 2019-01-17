<?php

namespace FPPHP\Lists;

function takeWhile($perdicate)
{
    return function ($arr) use ($perdicate) {
        $spliAt = 0;

        foreach ($arr as $key => $value) {
            if (!\call_user_func_array($perdicate, [&$value])) break;

            $spliAt += 1;
        }

        return \array_splice($arr, 0, $spliAt);
    };
}
