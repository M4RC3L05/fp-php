<?php

namespace FPPHP\Functions;

function applySpec(array $spec)
{
    return function (...$args) use ($spec) {

        $inner = function (array &$arr) use ($spec, $args, &$inner) {

            foreach ($arr as $key => $value) {


                if (\is_array($value)) $arr[$key] = $inner($value);

                if (\is_callable($value)) $arr[$key] = $value(...$args);
            }

            return $arr;
        };

        return $inner($spec);
    };
}
