<?php declare(strict_types = 1);

namespace Schillermann\JustOOFramework;

interface OutputInterface
{
    function with(string $name, string $value): OutputInterface;
    function writeTo(OutputStreamInterface $output): void;
}