<?php

namespace FPPHP\Lists;

use function FPPHP\utils\isAssoc;


function uniq(array $arr)
{
    $isAssoc = isAssoc($arr);
    $tmpArr = [];

    foreach ($arr as $key => $value) {
        if (\in_array($value, $tmpArr, true)) continue;

        if ($isAssoc) $tmpArr[$key] = $value;
        else \array_push($tmpArr, $value);
    }

    return $tmpArr;
}
