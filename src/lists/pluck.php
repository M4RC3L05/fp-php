<?php

namespace FPPHP\Lists;

use function FPPHP\utils\isAssoc;


function pluck($index)
{
    return function (array $arr) use ($index) {
        $isAssoc = isAssoc($arr);

        $tmpArr = [];

        foreach ($arr as $key => $value) {
            $toArr = (array)$value;

            if ($isAssoc) {
                if (\array_key_exists($index, $toArr))
                    $tmpArr[$key] = $toArr[$index];
                else
                    $tmpArr[$key] = null;
            } else {
                if (\array_key_exists($index, $toArr))
                    \array_push($tmpArr, $toArr[$index]);
                else
                    \array_push($tmpArr, null);
            }
        }

        return $tmpArr;
    };
}
