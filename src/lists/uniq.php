<?php

namespace FPPHP\Lists;

function uniq($arr)
{
    $isAssoc = \array_values($arr) !== $arr;
    $tmpArr = [];

    foreach ($arr as $key => $value) {
        if (\in_array($value, $tmpArr, true)) continue;

        if ($isAssoc) $tmpArr[$key] = $value;
        else \array_push($tmpArr, $value);
    }

    return $tmpArr;
}
