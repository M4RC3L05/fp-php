<?php

namespace FPPHP\Lists;

use function FPPHP\utils\isAssoc;


function flatten(array $arr)
{
    if (\count($arr) <= 0) return [];

    $isAssoc = isAssoc($arr);
    $tmp = [];
    array_walk_recursive($arr, function ($v, $k) use (&$tmp, $isAssoc) {
        if ($isAssoc) $tmp[$k] = $v;
        else $tmp[] = $v;
    });
    return $tmp;
}
