<?php

namespace FPPHP;

function memoize($fn)
{
    $memo = [];

    return function (...$args) use (&$memo, $fn) {
        $argsStr = implode("", $args);

        if (array_key_exists($argsStr, $memo)) return $memo[$argsStr];

        $memo[$argsStr] = $fn(...$args);

        return $memo[$argsStr];
    };
}