<?php

namespace FPPHP\Lists;

function reduceBy($fn)
{
    return function ($valAcc) use ($fn) {
        return function ($keyFn) use ($valAcc, $fn) {
            return function ($arr) use ($valAcc, $fn, $keyFn) {
                return reduce(function ($acc, $curr) use ($keyFn, $fn, $valAcc) {
                    $key = \call_user_func_array($keyFn, [&$curr]);
                    $acc[$key] = \call_user_func_array($fn, [(\array_key_exists($key, $acc) ? $acc[$key] : $valAcc), &$curr]);
                    return $acc;
                })($valAcc)($arr);
            };
        };
    };
}
