<?php declare(strict_types = 1);

namespace Schillermann\JustOOFramework;

interface OutputStreamInterface
{
    function write(string $text);
}