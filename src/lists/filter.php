<?php

namespace FPPHP\Lists;

function filter(callable $fn)
{
    return function (array $iterable) use ($fn) {
        $isAssoc = \array_values($iterable) !== $iterable;
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
