<?php

namespace FPPHP\Lists;

function intersperse($val)
{
    return function ($arr) use ($val) {
        $tmpArr = [];

        foreach ($arr as $key => $value) {
            \array_push($tmpArr, $value);

            if ($key + 1 < \count($arr))
                \array_push($tmpArr, $val);
        }

        return $tmpArr;
    };
}
