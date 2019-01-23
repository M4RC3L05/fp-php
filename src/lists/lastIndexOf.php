<?php

namespace FPPHP\Lists;

function lastIndexOf($val)
{
    return function (array $arr) use ($val) {
        return indexOf($val)(reverse(true)($arr));
    };
}
