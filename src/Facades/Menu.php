<?php

namespace Inneuron\Menu\Facades;

use Illuminate\Support\Facades\Facade;
use Inneuron\Menu\Contracts\MenuItem;

/**
 * @method \Inneuron\Menu\Contracts\Menu create($name = 'default')
 * @method \Inneuron\Menu\Contracts\Menu addItem(MenuItem $item, $menu = 'default')
 * @method array get($menu = 'default')
 * @method string render($menu = 'default')
 */
class Menu extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'menu';
    }
}