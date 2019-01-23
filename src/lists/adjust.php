<?php

namespace FPPHP\Lists;

function adjust(int $num)
{
    return function (callable $fn) use ($num) {
        return function (array $arr) use ($fn, $num) {
            $arrValues = \array_values($arr);
            $toModify = \array_slice($arr, 0);
            $positiveNum = ($num < 0 ? \count($arr) + $num : $num);

            if (!\array_key_exists($positiveNum, $arrValues)) return $toModify;

            $arrValues[$positiveNum] = $fn($arrValues[$positiveNum]);

            return \array_combine(\array_keys($arr), $arrValues);
        };
    };
}
