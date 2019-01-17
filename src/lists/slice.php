<?php

namespace FPPHP\Lists;

function slice($from)
{
    return function ($to) use ($from) {
        return function ($arr) use ($to, $from) {
            return \array_slice($arr, $from, $to - $from);
        };
    };
}
