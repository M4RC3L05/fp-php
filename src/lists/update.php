<?php

namespace FPPHP\Lists;

function update($updatePos)
{
    return function ($ele) use ($updatePos) {
        return function (array $arr) use ($ele, $updatePos) {
            $isAssoc = \array_values($arr) !== $arr;

            if ($isAssoc) {

                if (!\array_key_exists($updatePos, $arr)) return $arr;

                $tmpArr = \array_slice($arr, 0);
                $tmpArr[$updatePos] = $ele;
                return $tmpArr;
            } else {
                $arrValues = \array_values($arr);

                $positivePos = ($updatePos < 0 ? \count($arrValues) + $updatePos : $updatePos);

                if ($positivePos < 0 || $positivePos > \count($arr)) return $arr;

                $arrValues[$positivePos] = $ele;

                return $arrValues;
            }
        };
    };
}
