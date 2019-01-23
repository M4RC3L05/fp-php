<?php

namespace FPPHP\Lists;

function reject(callable $perdicate)
{
    return function (array $arr) use ($perdicate) {
        return filter(function ($x, $y) use ($perdicate) {
            return !$perdicate($x, $y);
        })($arr);
    };
}
