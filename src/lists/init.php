<?php

namespace FPPHP\Lists;

function init(array $arr)
{
    return take(\count($arr) - 1)($arr);
}
