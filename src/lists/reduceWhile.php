<?php

namespace FPPHP\Lists;

function reduceWhile(callable $perdicate)
{
    return function (callable $fn) use ($perdicate) {
        return function ($acc) use ($fn, $perdicate) {
            return function (array $arr) use ($fn, $perdicate, $acc) {
                return reduce(function ($acc, $curr) use ($perdicate, $fn) {
                    if ($perdicate($acc, $curr)) return $fn($acc, $curr);
                    return $acc;
                })($acc)($arr);
            };
        };
    };
}
