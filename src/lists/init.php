<?php

namespace FPPHP\Lists;

function init($arr)
{
    return take(\count($arr) - 1)($arr);
}
