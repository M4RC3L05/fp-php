<?php

namespace FPPHP\Lists;

function reduceRight(callable $fn)
{
    return function ($init) use ($fn) {
        return function (array $iterable) use ($fn, $init) {
            return \array_reduce(\array_reverse($iterable), $fn, $init);
        };
    };
}
