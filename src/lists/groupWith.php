<?php

namespace FPPHP\Lists;

/**
 * 
 * groupWith: (x -> bool) -> [x] -> [[x]]
 * 
 * Groups a given array by the result of calling the provided function
 * 
 * @param callable $perdicate
 * @param array $list
 * @return array
 * 
 */
function groupWith(callable $perdicate)
{
    return function (array $list) use ($perdicate) {

        $arrValues = \array_values($list);
        $isAssoc = $arrValues !== $list;
        $total = \count($list);

        if ($total <= 0) return [];

        $tmpArr = [];
        $currIndex = 0;

        while ($currIndex < $total) {
            $nextId = $currIndex + 1;

            while ($nextId < $total && $perdicate($arrValues[$nextId - 1], $arrValues[$nextId])) {
                $nextId += 1;
            }

            \array_push($tmpArr, \array_slice($list, $currIndex, $nextId - $currIndex));
            $currIndex = $nextId;
        };

        return $tmpArr;
    };
}
