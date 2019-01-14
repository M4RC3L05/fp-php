<?php

namespace FPPHP\Lists;

function prepend($val)
{
    return function ($arr) use ($val) {
        return \array_merge([$val], $arr);
    };
}
