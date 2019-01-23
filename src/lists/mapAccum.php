<?php

namespace FPPHP\Lists;

function mapAccum(callable $fn)
{
    return function ($acc) use ($fn) {
        return function (array $arr) use ($fn, $acc) {

            $res = [];
            $tuple = [$acc];

            foreach ($arr as $key => $value) {
                $tuple = $fn($tuple[0], $value);
                $res[$key] = $tuple[1];
            }

            return [$tuple[0], $res];
        };
    };
}
