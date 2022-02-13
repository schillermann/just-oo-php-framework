<?php declare(strict_types = 1);

namespace Schillermann\JustOOFramework;

class Session
{
    private PageInterface $page;

    function __construct(PageInterface $page)
    {
        $this->page = $page;
    }

    function with(RequestInterface $request): PageInterface
    {
        $target = $this->page;

        foreach ($request->head() as $key => $value) {
            $target = $this->page->with($key, $value);
        }

        $target = $this->page->with('X-Query', $_SERVER['REQUEST_URI']);

        return $target;
    }
}