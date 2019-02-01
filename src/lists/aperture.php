<?php

namespace FPPHP\Lists;

use function FPPHP\utils\isAssoc;

/**
 * 
 * aperture: int -> [x] -> [[x]]
 * 
 * Retruns a new array of tuples with the provided size
 * 
 * @param int $size
 * @param array $list
 * @return array
 * 
 */
function aperture(int $size)
{
    return function (array $list) use ($size) {
        $tmpArr = [];
        $pairs = 0;
        $curr = 0;

        if ($size > \count($list)) return $tmpArr;

        if ($size === \count($list)) return [\array_slice($list, 0)];

        $isAssoc = isAssoc($list);
        $tmpArr = [[]];

        foreach ($list as $key => $value) {
            if ($pairs > $size - 1) {
                $pairs = 0;
                $curr += 1;
                if ($isAssoc)
                    $tmpArr[$curr] = [$key => $value];
                else
                    $tmpArr[$curr] = [$value];
                $pairs += 1;
            } else {
                if ($isAssoc)
                    $tmpArr[$curr][$key] = $value;

                else \array_push($tmpArr[$curr], $value);

                $pairs += 1;
            }
        }

        return $tmpArr;
    };
}
