<?php

namespace FPPHP\Lists;

function slice(int $from)
{
    return function (int $to) use ($from) {
        return function ($arr) use ($to, $from) {
            return \array_slice($arr, $from, $to - $from);
        };
    };
}
