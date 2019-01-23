<?php

namespace FPPHP\Lists;

function mergeAll(array $arr)
{
    return reduce(function ($acc, $curr) {
        return \array_merge($acc, $curr);
    })([])($arr);
}
