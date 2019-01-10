<?php

namespace FPPHP\Lists;

function endsWith($arr1)
{
    return function ($arr2) use ($arr1) {
        return $arr1 === takeLast(\count($arr1))($arr2);
    };
}
