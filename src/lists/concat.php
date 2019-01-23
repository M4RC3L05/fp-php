<?php

namespace FPPHP\Lists;

function concat(array $arr1)
{
    return function (array $arr2) use ($arr1) {
        return \array_merge($arr1, $arr2);
    };
}
