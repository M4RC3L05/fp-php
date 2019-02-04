<?php

namespace FPPHP\Functions;

function bind(mixed $newContext)
{
    return function (callable $fn) use ($newContext) {

        if (!\is_object($newContext)) return $fn;

        return (\Closure::fromCallable($fn))->bindTo($newContext);
    };
}
        