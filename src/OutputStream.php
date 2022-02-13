<?php declare(strict_types = 1);

namespace Schillermann\JustOOFramework;

class OutputStream implements OutputStreamInterface
{

    public function write(string $text)
    {
        file_put_contents("php://output", $text);
    }
}