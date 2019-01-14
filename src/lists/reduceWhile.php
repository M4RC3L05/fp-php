<?php

namespace FPPHP\Lists;

function reduceWhile($perdicate)
{
    return function ($fn) use ($perdicate) {
        return function ($acc) use ($fn, $perdicate) {
            return function ($arr) use ($fn, $perdicate, $acc) {
                return reduce(function ($acc, $curr) use ($perdicate, $fn) {
                    if (\call_user_func_array($perdicate, [&$acc, &$curr])) return \call_user_func_array($fn, [&$acc, &$curr]);
                    return $acc;
                })($acc)($arr);
            };
        };
    };
}
