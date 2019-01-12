<?php

namespace FPPHP\Lists;

function lastIndexOf($val)
{
    return function ($arr) use ($val) {
        return indexOf($val)(reverse(true)($arr));
    };
}
