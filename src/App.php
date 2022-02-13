<?php declare(strict_types = 1);

namespace Schillermann\JustOOFramework;

class App
{
    private PageInterface $page;

    function __construct(PageInterface $page)
    {
        $this->page = $page;
    }

    function start()
    {
        $session = new Session($this->page);

        $session
            ->with(new Request())
            ->via(new SimpleOutput(''))
            ->writeTo(new OutputStream());
    }
}