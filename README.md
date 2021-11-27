# NavMenu

Simple menu builder for Laravel

### Installation
Run this to install:
```bash
composer require az-iar/menu
```

### How To Use
You can create menu in `AppServiceProvider` inside `boot` method
```php
use Inneuron\NavMenu\Facades\Menu;

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