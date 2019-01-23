<?php

namespace FPPHP\Lists;

function mapAccumRight(callable $fn)
{
    return function ($acc) use ($fn) {
        return function (array $arr) use ($fn, $acc) {

            $res = [];
            $tuple = [$acc];

            foreach (\array_reverse($arr, true) as $key => $value) {
                $tuple = $fn($tuple[0], $value);
                $res[$key] = $tuple[1];
            }

            return [$tuple[0], $res];
        };
    };
}
