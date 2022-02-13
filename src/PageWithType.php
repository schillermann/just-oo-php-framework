<?php declare(strict_types = 1);

namespace Schillermann\JustOOFramework;

class PageWithType implements PageInterface
{
    private PageInterface $origin;
    private string $type;

    function __construct(PageInterface $page, string $ctype)
    {
        $this->origin = $page;
        $this->type = $ctype;
    }

    function with(string $key, string $value): PageInterface
    {
        return $this;
    }

    function via(OutputInterface $output): OutputInterface
    {
        return $this->origin->via(
            $output->with('Content-Type', $this->type)
        );
    }
}