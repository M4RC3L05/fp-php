<?php

namespace FPPHP\Functions;

function ap(array $fnList)
{
    return function (array $valList) use ($fnList) {
        $tmpArr = [];

        foreach ($fnList as $key => $fn) {
            foreach ($valList as $key => $value) {
                \array_push($tmpArr, $fn($value));
            }
        }

        return $tmpArr;
    };
}
