<?php

namespace FPPHP\Lists;

function startsWith($arr1)
{
    return function ($arr2) use ($arr1) {
        if (count($arr1) <= 0 || \count($arr2) <= 0) return false;

        return \array_slice($arr1, 0, 1) === \array_slice($arr2, 0, 1);
    };
}
