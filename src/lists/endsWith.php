<?php

namespace FPPHP\Lists;

function endsWith(array $arr1)
{
    return function (array $arr2) use ($arr1) {
        return $arr1 === takeLast(\count($arr1))($arr2);
    };
}
