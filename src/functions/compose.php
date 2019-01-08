<?php

namespace FPPHP\Functions;

function compose(...$fns)
{
    return pipe(...\array_reverse($fns));
}
