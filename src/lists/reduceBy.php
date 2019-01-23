<?php

namespace FPPHP\Lists;

function reduceBy(callable $fn)
{
    return function ($valAcc) use ($fn) {
        return function (callable $keyFn) use ($valAcc, $fn) {
            return function (array $arr) use ($valAcc, $fn, $keyFn) {
                return reduce(function ($acc, $curr) use ($keyFn, $fn, $valAcc) {
                    $toArr = (array)$curr;
                    $key = $keyFn($toArr);
                    $acc[$key] = $fn((\array_key_exists($key, $acc) ? $acc[$key] : $valAcc), $toArr);
                    return $acc;
                })($valAcc)($arr);
            };
        };
    };
}
