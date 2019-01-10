<?php

namespace FPPHP\Lists;

function fromPairs($arr)
{
    $tmp = [];

    forEvery(function ($x) use (&$tmp) {
        $tmp[$x[0]] = $x[1];
    })($arr);

    return $tmp;
}
