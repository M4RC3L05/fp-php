<?php

namespace FPPHP\Lists;

use function FPPHP\utils\isAssoc;


/**
 * 
 * xprod: [x] -> [y] -> [[x, y]]
 * 
 * Returns a new array with all possible conbinations between the
 * 2 provided arrays
 * 
 * @param array $list1
 * @param array $list2
 * @return array
 * 
 */
function xprod(array $list1)
{
    return function (array $list2) use ($list1) {
        $isL1Assoc = isAssoc($list1);
        $isL2Assoc = isAssoc($list2);

        $tmpArr = [];
        $curr = 0;

        foreach ($list1 as $k1 => $v1) {
            foreach ($list2 as $k2 => $v2) {
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
