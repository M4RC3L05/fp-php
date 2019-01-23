<?php

namespace FPPHP\Lists;

function reduceBy(callable $fn)
{
    return function ($valAcc) use ($fn) {
        return function (callable $keyFn) use ($valAcc, $fn) {
            return function (array $arr) use ($valAcc, $fn, $keyFn) {
                return reduce(function ($acc, $curr) use ($keyFn, $fn, $valAcc) {

                    $key = $keyFn($curr);
                    $acc[$key] = $fn((\array_key_exists($key, $acc) ? $acc[$key] : $valAcc), $curr);
                    return $acc;
                })($valAcc)($arr);
            };
        };
    };
}
