<?php

namespace FPPHP\Lists;

use function FPPHP\Functions\pipe;


function zipAssoc(array $l1)
{
    return pipe(zip($l1), "FPPHP\\Lists\\fromPairs");
}
