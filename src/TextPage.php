<?php declare(strict_types = 1);

namespace Schillermann\JustOOFramework;

class TextPage implements PageInterface
{

    private string $body;

    function __construct(string $text) {
        $this->body = $text;
    }

    function with(string $key, string $value): PageInterface {
        return $this;
    }

    function via(OutputInterface $output): OutputInterface
    {
        return $output
            ->with("Content-Type", "text/plain")
            ->with("Content-Length", strval(strlen($this->body)))
            ->with("X-Body", $this->body);
    }
}