<?php

namespace FPPHP\Lists;

function drop(int $dropNum)
{
    return function (array $arr) use ($dropNum) {

        if ($dropNum < 0) return \array_slice($arr, 0);

        if ($dropNum >= \count($arr)) return [];

        return takeLast(\count($arr) - $dropNum)($arr);
    };
}
