<?php

namespace Inneuron\Menu\Factory;

use Inneuron\Menu\Contracts\Menu as MenuContract;
use Inneuron\Menu\Contracts\MenuItem;
use Inneuron\Menu\Exceptions\MenuNotExist;

class Menu implements MenuContract
{
    private array $menu = [];

    private string $current;

    public function create($menu = 'default'): self
    {
        if (!array_key_exists($menu, $this->menu)) {
            $this->menu[$menu] = [];
        }

        $this->current = $menu;

        return $this;
    }

    /**
     * @throws \Inneuron\Menu\Exceptions\MenuNotExist
     */
    public function addItem(MenuItem $item, $menu = null): self
    {
        $menu = $menu ?? $this->current;

        $this->checkMenuExists($menu);

        $items = $this->menu[$menu];

        array_push($items, $item);

        $this->menu[$menu] = $items;

        return $this;
    }

    /**
     * @throws \Inneuron\Menu\Exceptions\MenuNotExist
     */
    public function get($menu = 'default'): array
    {
        $this->checkMenuExists($menu);

        $items = array_filter($this->menu[$menu], function (MenuItem $item) {
            return $item->authorize();
        });

        return array_values(
            array_map(function (MenuItem $item) {
                return $item->toArray();
            }, $items)
        );
    }

    /**
     * @throws \Inneuron\Menu\Exceptions\MenuNotExist
     */
    public function render($menu = 'default'): string
    {
        $this->checkMenuExists($menu);

        // TODO: Render into html
        return '';
    }

    /**
     * @param string $menu
     * @throws \Inneuron\Menu\Exceptions\MenuNotExist
     */
    private function checkMenuExists(string $menu): void
    {
        if (!array_key_exists($menu, $this->menu)) {
            throw new MenuNotExist("{$menu} menu does not exist! Create the menu using `Menu::create($menu)`");
        }
    }
}
