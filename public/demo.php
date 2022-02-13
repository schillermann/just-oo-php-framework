<?php

require __DIR__ . '/../vendor/autoload.php';

use Schillermann\JustOOFramework\App;
use Schillermann\JustOOFramework\OutputInterface;
use Schillermann\JustOOFramework\PageInterface;
use Schillermann\JustOOFramework\TextPage;

class DemoPage implements PageInterface
{
    function with(string $name, string $value): PageInterface
    {
        if ('/' === $value) {
          return new TextPage('Hello, world!');
        } else if ('/user') {
            return new TextPage('It\'s Me,Mario!');
        }
        return new TextPage("Not found!");
    }

    function via(OutputInterface $output): OutputInterface
    {
      return $output->with("X-Body", "Not found");
    }
}

$app = new App(
    new DemoPage()
);

$app->start();