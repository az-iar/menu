<?php

namespace Inneuron\Menu\Tests\Feature;

use Inneuron\Menu\Facades\Menu;
use Inneuron\Menu\Factory\Menu as MenuFactory;
use Inneuron\Menu\Tests\Stubs\Dashboard;
use Inneuron\Menu\Tests\Stubs\Profile;
use Inneuron\Menu\Tests\TestCase;

class MenuTest extends TestCase
{
    public function test_can_create_menu()
    {
        $menu = Menu::create();

        $this->assertInstanceOf(MenuFactory::class, $menu);
    }

    public function test_can_add_menu_item()
    {
        $menu = Menu::create();
        $menu->addItem(new Dashboard);

        $this->assertNotEmpty($menu->get());
        $this->assertCount(1, $menu->get());

        $item = $menu->get()[0];

        $this->assertArrayHasKey('id', $item);
        $this->assertArrayHasKey('href', $item);
        $this->assertArrayHasKey('title', $item);
        $this->assertArrayHasKey('children', $item);
        $this->assertArrayHasKey('icon', $item);
        $this->assertArrayHasKey('current', $item);

        $this->assertEquals('dashboard', $item['id']);
        $this->assertEquals('Dashboard', $item['title']);
        $this->assertEquals(url('/'), $item['href']);
        $this->assertEquals(false, $item['current']);
        $this->assertEquals('', $item['icon']);
    }

    public function test_can_create_named_menu()
    {
        $menu = Menu::create('profile');
        $menu->addItem(new Profile);

        $this->assertCount(1, $menu->get());

        $item = $menu->get()[0];

        $this->assertArrayHasKey('id', $item);
        $this->assertArrayHasKey('href', $item);
        $this->assertArrayHasKey('title', $item);
        $this->assertArrayHasKey('children', $item);
        $this->assertArrayHasKey('icon', $item);
        $this->assertArrayHasKey('current', $item);

        $this->assertEquals('profile', $item['id']);
        $this->assertEquals('Profile', $item['title']);
        $this->assertEquals(url('profile'), $item['href']);
        $this->assertEquals(false, $item['current']);
        $this->assertEquals('', $item['icon']);
    }
}
