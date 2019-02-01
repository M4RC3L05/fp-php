<?php

namespace FPPHP\Lists;

/**
 * 
 * zip: [x] -> [y] -> [[x, y]]
 * 
 * Returns a new array wich contains pairs of equal positioned 
 * elements
 * 
 * @param array $list1
 * @param array $list2
 * @return array
 * 
 */
function zip(array $list1)
{
    return function (array $list2) use ($list1) {
        $tmpArr = [];

        $lenL1 = count($list1);
        $lenL2 = count($list2);
        $arrMin = \min($lenL1, $lenL2);

        $curr = 0;

        foreach ($list1 as $key => $value) {
            if ($curr >= $arrMin) break;

            if (!\array_key_exists($curr, $tmpArr)) \array_push($tmpArr, []);

            $tmpArr[$curr] = \array_merge($tmpArr[$curr], \array_slice($list1, $curr, 1));
            $tmpArr[$curr] = \array_merge($tmpArr[$curr], \array_slice($list2, $curr, 1));

            $curr += 1;
        }

        return $tmpArr;
    };
}
