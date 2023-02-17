# Menu

Simple menu builder for Laravel

### Installation
Run this to install:
```bash
composer require az-iar/menu
```

### How To Use
You can generate menu item using `php artisan make:menu Dashboard`. It will create a menu item like this
```php
namespace App\Menus;

class Dashboard {
    use AsMenuItem;
    
    public function href(): string
    {
        // TODO: Implement href() method.
    }

    public function title(): string
    {
        // TODO: Implement title() method.
    }
    
    // Override default method from `AsMenuItem` trait
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->can('view-dashboard');
    }
    ...
}
```
Then create menu in `AppServiceProvider` inside `boot` method
```php
use Inneuron\NavMenu\Facades\Menu;
use Inneuron\Menu\Concerns\AsMenuItem;

// Add menu item


// Default menu
$menu = Menu::create()
    ->addItem(new Dashboard)
    ->addItem(new Users)
    ->addItem(new Settings);

// Another menu
$menu = Menu::create('profile')
    ->addItem(new MyProfile)
    ->addItem(new Notifications)
    ->addItem(new Settings);
```
Use it like this
```php
use Inneuron\NavMenu\Facades\Menu;

// Output as array
Menu::get();
Menu::get('profile');

// Render in HTML
Menu::render();
Menu::render('profile');
```