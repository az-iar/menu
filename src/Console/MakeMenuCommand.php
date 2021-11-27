<?php

namespace Inneuron\Menu\Console;

use Illuminate\Console\GeneratorCommand;

class MakeMenuCommand extends GeneratorCommand
{
    protected $signature = 'make:menu {name}';

    protected $description = 'Generate menu item';

    protected function getStub()
    {
        return __DIR__ . '/../../stubs/MenuItem.php';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Menus';
    }
}
