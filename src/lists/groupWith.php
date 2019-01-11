<?php

namespace FPPHP\Lists;

function groupWith($perdicate)
{
    return function ($arr) use ($perdicate) {

        $arrValues = \array_values($arr);
        $isAssoc = $arrValues !== $arr;
        $tot = \count($arr);

        if ($tot <= 0) return [];

        $tmpArr = [];
        $currIndex = 0;



        while ($currIndex < $tot) {
            $nextId = $currIndex + 1;

            while ($nextId < $tot && \call_user_func_array($perdicate, [&$arrValues[$nextId - 1], &$arrValues[$nextId]])) {
                $nextId += 1;
            }

            \array_push($tmpArr, \array_slice($arr, $currIndex, $nextId - $currIndex));
            $currIndex = $nextId;
        };

        return $tmpArr;
    };
}
