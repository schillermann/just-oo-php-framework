<?php declare(strict_types = 1);

namespace Schillermann\JustOOFramework;

class PageWithRoutes implements PageInterface {

    private string $path;
    private PageInterface $right;
    private PageInterface $wrong;

    function __construct(string $path, PageInterface $right, PageInterface $wrong) {
        $this->path = $path;
        $this->right = $right;
        $this->wrong = $wrong;
    }

    function with(string $key, string $value): PageInterface {
        if ('X-Path' === $key) {
            if ($value === $this->path) {
                return $this->right->with($key, $value);
            }
            return $this->wrong->with($key, $value);
        }
        return $this;
    }

    function via(OutputInterface $output): OutputInterface {
        return $output;
    }
}