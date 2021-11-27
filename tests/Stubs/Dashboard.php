<?php

namespace Inneuron\Menu\Tests\Stubs;

use Inneuron\Menu\Concerns\AsMenuItem;
use Inneuron\Menu\Contracts\MenuItem;

class Dashboard implements MenuItem
{
    use AsMenuItem;

    public function href(): string
    {
        return url('');
    }

    public function title(): string
    {
        return __('Dashboard');
    }
}