<?php declare(strict_types = 1);

namespace Schillermann\JustOOFramework;

class SimpleOutput implements OutputInterface
{
    private string $before;

    function __construct(string $text)
    {
        $this->before = $text;
    }

    function __toString(): string
    {
        return $this->before;
    }

    function with(string $name, string $value): OutputInterface
    {
        $after = $this->before;
        if (0 === strlen($after)) {
            $after .= "HTTP/1.1 200 OK\r\n";
        }
        if ('X-Body' === $name) {
            $after .= "\r\n" . $value;
        } else {
            $after .= $name . ": " . $value . "\r\n";
        }
        return new SimpleOutput($after);
    }

    public function writeTo(OutputStreamInterface $output): void
    {
        $output->write($this->before);
    }
}