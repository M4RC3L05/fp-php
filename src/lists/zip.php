<?php

namespace FPPHP\Lists;

function zip(array $l1)
{
    return function (array $l2) use ($l1) {
        $tmpArr = [];

        $lenL1 = count($l1);
        $lenL2 = count($l2);
        $arrMin = \min($lenL1, $lenL2);

        $curr = 0;

        foreach ($l1 as $key => $value) {
            if ($curr >= $arrMin) break;

            if (!\array_key_exists($curr, $tmpArr)) \array_push($tmpArr, []);

            $tmpArr[$curr] = \array_merge($tmpArr[$curr], \array_slice($l1, $curr, 1));
            $tmpArr[$curr] = \array_merge($tmpArr[$curr], \array_slice($l2, $curr, 1));

            $curr += 1;
        }

        return $tmpArr;
    };
}
