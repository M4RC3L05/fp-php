<?php

namespace FPPHP\Lists;

function join(string $separator)
{
    return function (array $arr) use ($separator) {
        return \implode($separator, $arr);
    };
}
