<?php

namespace FPPHP\Lists;

function mergeAll($arr)
{
    return reduce(function ($acc, $curr) {
        return \array_merge($acc, $curr);
    })([])($arr);
}
