<?php

namespace FPPHP\Lists;

function dropLast($num)
{
    return function ($arr) use ($num) {

        if ($num < 0) return \array_slice($arr, 0);

        if ($num >= \count($arr)) return [];

        return take(\count($arr) - $num)($arr);
    };
}
