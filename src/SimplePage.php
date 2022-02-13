<?php declare(strict_types = 1);

namespace Schillermann\JustOOFramework;

class SimplePage implements PageInterface {

    private string $body;

    function __construct(string $text)
    {
        $this->body = $text;
    }

    function with(string $key, string $value): PageInterface {
        return $this;
    }

    public function via(OutputInterface $output): OutputInterface
    {
        return $output
            ->with("Content-Length", strval(strlen($this->body)))
            ->with("X-Body", $this->body);
    }
}