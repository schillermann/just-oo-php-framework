<?php declare(strict_types = 1);

namespace Schillermann\JustOOFramework;

interface PageInterface
{
    function with(string $key, string $value): PageInterface;
    function via(OutputInterface $output): OutputInterface;
}