<?php

namespace Inneuron\Menu\Tests\Stubs;

use Inneuron\Menu\Concerns\AsMenuItem;
use Inneuron\Menu\Contracts\MenuItem;

class Profile implements MenuItem
{
    use AsMenuItem;

    public function href(): string
    {
        return url('profile');
    }

    public function title(): string
    {
        return __('Profile');
    }
}