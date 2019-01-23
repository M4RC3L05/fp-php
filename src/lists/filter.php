<?php

namespace FPPHP\Lists;

use function FPPHP\utils\isAssoc;


function filter(callable $fn)
{
    return function (array $iterable) use ($fn) {
        $isAssoc = isAssoc($iterable);
        $tmpArr = [];

        foreach ($iterable as $key => $value) {
            if ($fn($value, $key)) {
                if ($isAssoc) {
                    $tmpArr[$key] = $value;
                } else {
                    \array_push($tmpArr, $value);
                }
            }
        }

        return $tmpArr;
    };
}
