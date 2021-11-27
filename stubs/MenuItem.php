<?php

namespace DummyNamespace;

use Inneuron\Menu\Concerns\AsMenuItem;
use Inneuron\Menu\Contracts\MenuItem;

class DummyClass implements MenuItem
{
    use AsMenuItem;

    public function href(): string
    {
        // TODO: Implement href() method.
    }

    public function title(): string
    {
        // TODO: Implement title() method.
    }
}