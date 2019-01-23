<?php

namespace FPPHP\Lists;

function scan(callable $scanFN)
{
    return function ($init) use ($scanFN) {
        return function (array $arr) use ($init, $scanFN) {
            $arrLength = count($arr);
            $tmpArr = [$init];
            $tmpInit = $init;

            foreach ($arr as $key => $value) {
                $tmpInit = $scanFN($tmpInit, $value);
                \array_push($tmpArr, $tmpInit);
            }

            return $tmpArr;
        };
    };
}
