<?php

namespace FPPHP\Lists;

function zipWith(callable $fn)
{
    return function (array $l1) use ($fn) {
        return function (array $l2) use ($l1, $fn) {
            $tmpArr = [];

            $lenL1 = count($l1);
            $lenL2 = count($l2);
            $arrMin = \min($lenL1, $lenL2);

            $curr = 0;
            $arrV = \array_values($l2);

            foreach ($l1 as $key => $value) {

                if ($curr >= $arrMin) break;

                \array_push($tmpArr, $fn($value, $arrV[$curr]));

                $curr += 1;
            }

            return $tmpArr;
        };
    };
}
