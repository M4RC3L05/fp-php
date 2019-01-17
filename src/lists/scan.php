<?php

namespace FPPHP\Lists;

function scan($scanFN)
{
    return function ($init) use ($scanFN) {
        return function ($arr) use ($init, $scanFN) {
            $arrLength = count($arr);
            $tmpArr = [$init];
            $tmpInit = $init;

            foreach ($arr as $key => $value) {
                $tmpInit = \call_user_func_array($scanFN, [&$tmpInit, &$value]);
                \array_push($tmpArr, $tmpInit);
            }

            return $tmpArr;
        };
    };
}
