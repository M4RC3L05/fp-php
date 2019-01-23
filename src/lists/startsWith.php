<?php

namespace FPPHP\Lists;

function startsWith(array $arr1)
{
    return function (array $arr2) use ($arr1) {
        if (count($arr1) <= 0 || \count($arr2) <= 0) return false;

        return \array_slice($arr1, 0, 1) === \array_slice($arr2, 0, 1);
    };
}
