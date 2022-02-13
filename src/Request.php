<?php declare(strict_types = 1);

namespace Schillermann\JustOOFramework;

class Request implements RequestInterface
{
    public function head(): array
    {
        return getallheaders();
    }

    public function body(): string
    {
        return file_get_contents('php://input');
    }
    
}