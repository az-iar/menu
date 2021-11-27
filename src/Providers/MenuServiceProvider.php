<?php

namespace Inneuron\Menu\Providers;

use Illuminate\Support\ServiceProvider;
use Inneuron\Menu\Factory\Menu;

class MenuServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->singleton('menu', fn() => new Menu);
    }
}