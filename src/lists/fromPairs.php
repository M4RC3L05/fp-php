<?php

namespace FPPHP\Lists;

function fromPairs($arr)
{
    $tmp = [];

    foreach ($arr as $key => $value) {
        $tmp[$value[0]] = $value[1];
    }

    return $tmp;
}