<?php

namespace FPPHP\Functions;

/**
 * 
 * applySpec: [k => (*...) -> x] -> ((*...) -> [k => x])
 * 
 * By the spec provided, mapes recursively each prop of the spec and
 * applies to each function the args provided, and returns the spec
 * filled
 * 
 * @param array $spec
 * @param array $args
 * @return array
 * 
 */
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
