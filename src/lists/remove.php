<?php

namespace FPPHP\Lists;

function remove($from)
{
    return function ($count) use ($from) {
        return function ($arr) use ($from, $count) {
            if (\count($arr) <= 0) return [];

            $fromPositive = ($from < 0 ? \count($arr) + $from : $from);

            if ($fromPositive > \count($arr) || $fromPositive < 0) return [];

            $tmpArr = \array_slice($arr, 0);
            \array_splice($tmpArr, $fromPositive, $count);
            return $tmpArr;
        };
    };
}
