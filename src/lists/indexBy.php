<?php

namespace FPPHP\Lists;

function indexBy(callable $fn)
{
    return function ($assocArr) use ($fn) {
        $tmpArr = [];

        foreach ($assocArr as $key => $value) {
            $key = $fn((array)$value);

            $tmpArr[$key] = $value;
        }

        return $tmpArr;
    };
}
