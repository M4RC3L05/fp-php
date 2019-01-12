<?php

namespace FPPHP\Lists;

function nth($pos)
{
    return function ($arr) use ($pos) {
        if (count($arr) <= 0) return null;

        $positivePos = ($pos < 0 ? \count($arr) + $pos : $pos);

        if ($positivePos >= \count($arr) || $positivePos < 0) return null;

        return \array_values($arr)[$positivePos];
    };
}
