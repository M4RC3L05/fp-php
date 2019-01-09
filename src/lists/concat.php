<?php

namespace FPPHP\Lists;

function concat($arr1)
{
    return function ($arr2) use ($arr1) {
        return \array_merge($arr1, $arr2);
    };
}
