<?php

namespace Inneuron\Menu\Tests;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            'Inneuron\Menu\Providers\MenuServiceProvider',
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Menu' => 'Inneuron\Menu\Facades\Menu',
        ];
    }
}