<?php

namespace FPPHP\Functions;

function applyTo($val)
{
    return function (callable $fn) use ($val) {
        return $fn($val);
    };
}
