<?php

namespace FPPHP\Lists;

use function FPPHP\utils\isAssoc;


function uniqWith(callable $perdicate)
{
    return function (array $arr) use ($perdicate) {
        $tmpArr = [];
        $values = [];
        $isAssoc = isAssoc($arr);

        foreach ($arr as $key => $value) {

            $inArr = false;

            for ($i = 0; $i < count($tmpArr); $i++) {
                if (!$perdicate($value, $values[$i])) continue;

                $inArr = true;
                break;
            }

            if ($inArr) continue;

            if ($isAssoc) {
                $tmpArr[$key] = $value;
            } else {
                \array_push($tmpArr, $value);
            }

            \array_push($values, $value);
        }

        return $tmpArr;
    };
}
