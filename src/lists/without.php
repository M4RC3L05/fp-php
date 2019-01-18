<?php

namespace FPPHP\Lists;

function without(array $remArr)
{
    return function (array $arr) use ($remArr) {
        return filter(function ($x) use ($remArr) {
            return !\in_array($x, $remArr, true);
        })($arr);
    };
}
