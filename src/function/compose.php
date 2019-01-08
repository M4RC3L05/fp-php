<?php

namespace FPPHP\Funtion;

function compose(...$fns)
{
    return pipe(...\array_reverse($fns));
}
