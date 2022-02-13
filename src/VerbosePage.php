<?php declare(strict_types = 1);

namespace Schillermann\JustOOFramework;

class VerbosePage implements PageInterface
{

    private array $args;

    function __construct() {
        $this->args = [];
    }

    function with(string $key, string $value): PageInterface
    {
        $this->args[$key] = $value;
        return $this;
    }

    function via(OutputInterface $output): OutputInterface
    {
        return (new TextPage(
            http_build_query($this->args,'',', ')
        ))->via($output);
    }
}