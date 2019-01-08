<?php

namespace FPPHP\Functions;

function memoize($fn)
{
    $memo = [];

    return function (...$args) use (&$memo, $fn) {

        if (\is_null($fn) || !\is_callable($fn)) throw new \Exception("No function was provided to memoize");

        if (\count($args) <= 0) throw new \Exception("No arguments were provided.");


        $argsStr = implode("", $args);

        if (array_key_exists($argsStr, $memo)) return $memo[$argsStr];

        $memo[$argsStr] = \call_user_func($fn, ...$args);

        return $memo[$argsStr];
    };
}
