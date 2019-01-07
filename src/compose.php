<?php

namespace FPPHP;

function compose(...$fns)
{
    return pipe(...\array_reverse($fns));
}
