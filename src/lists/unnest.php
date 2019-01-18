<?php

namespace FPPHP\Lists;

function unnest(array $arr)
{
    return chain(function ($x) {
        return $x;
    })($arr);
}
