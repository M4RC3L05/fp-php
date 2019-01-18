<?php

namespace FPPHP\Lists;

function xprod(array $l1)
{
    return function (array $l2) use ($l1) {
        $isL1Assoc = \array_values($l1) !== $l1;
        $isL2Assoc = \array_values($l2) !== $l2;

        $tmpArr = [];
        $curr = 0;

        foreach ($l1 as $k1 => $v1) {
            foreach ($l2 as $k2 => $v2) {
                if (!\array_key_exists($curr, $tmpArr)) \array_push($tmpArr, []);

                if ($isL1Assoc) {
                    $tmpArr[$curr][$k1] = $v1;

                } else {
                    \array_push($tmpArr[$curr], $v1);

                }

                if ($isL2Assoc) {
                    $tmpArr[$curr][$k2] = $v2;
                } else {
                    \array_push($tmpArr[$curr], $v2);
                }

                $curr += 1;
            }
        }

        return $tmpArr;
    };
}
