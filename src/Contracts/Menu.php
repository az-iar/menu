<?php

namespace Inneuron\Menu\Contracts;

interface Menu
{
    public function create($menu = 'default');

    public function addItem(MenuItem $item, $menu = 'default');

    public function get($menu = 'default'): array;

    public function render($menu = 'default'): string;
}