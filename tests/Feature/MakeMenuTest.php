<?php

namespace Inneuron\Menu\Tests\Feature;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Inneuron\Menu\Tests\TestCase;

class MakeMenuTest extends TestCase
{
    public function test_can_generate_menu_item()
    {
        // destination path of the Foo class
        $dashboard = app_path('Menus/Dashboard.php');

        // make sure we're starting from a clean state
        if (File::exists($dashboard)) {
            unlink($dashboard);
        }

        $this->assertFalse(File::exists($dashboard));

        // Run the make command
        Artisan::call('make:menu Dashboard');

        // Assert a new file is created
        $this->assertTrue(File::exists($dashboard));

        // Assert the file contains the right contents
        $expectedContents = <<<CLASS
        <?php
        
        namespace App\Menus;
        
        use Inneuron\Menu\Concerns\AsMenuItem;
        use Inneuron\Menu\Contracts\MenuItem;
        
        class Dashboard implements MenuItem
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
        CLASS;

        $this->assertEquals($expectedContents, file_get_contents($dashboard));
    }
}
