<?php

namespace FPPHP\Lists;

function transduce(callable $trasducer)
{
    return function (callable $reduceFn) use ($trasducer) {
        return function ($init) use ($reduceFn, $trasducer) {
            return function (array $arr) use ($init, $reduceFn, $trasducer) {
                return reduce($trasducer($reduceFn))($init)($arr);
            };
        };
    };
}
