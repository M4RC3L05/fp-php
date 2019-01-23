<?php

namespace FPPHP\Lists;

function prepend($val)
{
    return function (array $arr) use ($val) {
        return \array_merge([$val], $arr);
    };
}
