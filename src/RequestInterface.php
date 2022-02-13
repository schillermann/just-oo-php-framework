<?php declare(strict_types = 1);

namespace Schillermann\JustOOFramework;

interface RequestInterface
{
    function head(): array;

    function body();
}