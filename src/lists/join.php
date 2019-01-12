<?php

namespace FPPHP\Lists;

function join($separator)
{
    return function ($arr) use ($separator) {
        return \implode($separator, $arr);
    };
}
