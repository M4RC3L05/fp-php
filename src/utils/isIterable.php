<?php

namespace FPPHP\Utils;

function isIterable($iterable)
{

    if (\function_exists("is_iterable")) return \is_iterable($iterable);

    // For older versions of php
    if (\is_array($iterable) || (\is_object($iterable) && ($iterable instanceof \Traversable)))
        return true;

    else return false;
}
