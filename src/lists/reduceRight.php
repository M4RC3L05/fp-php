<?php

namespace FPPHP\Lists;

function reduceRight($fn)
{
    return function ($init) use ($fn) {
        return function ($iterable) use ($fn, $init) {
            return \array_reduce(\array_reverse($iterable), $fn, $init);
        };
    };
}
