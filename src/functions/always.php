<?php

namespace FPPHP\Functions;

function always($val)
{
    return function () use ($val) {
        return $val;
    };
}
