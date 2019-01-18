<?php

namespace FPPHP\Lists;

function transduce($trasducer)
{
    return function ($reduceFn) use ($trasducer) {
        return function ($init) use ($reduceFn, $trasducer) {
            return function ($arr) use ($init, $reduceFn, $trasducer) {
                return reduce(\call_user_func_array($trasducer, [$reduceFn]))($init)($arr);
            };
        };
    };
}
