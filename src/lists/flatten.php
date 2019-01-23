<?php

namespace FPPHP\Lists;

function flatten(array $arr)
{
    if (\count($arr) <= 0) return [];

    $isAssoc = \array_values($arr) !== $arr;
    $tmp = [];
    array_walk_recursive($arr, function ($v, $k) use (&$tmp, $isAssoc) {
        if ($isAssoc) $tmp[$k] = $v;
        else $tmp[] = $v;
    });
    return $tmp;
}
