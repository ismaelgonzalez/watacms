watacms
=======

My CMS built using cakePHP and bootstrap

Installation Instructions
-------------------------

1.- download composer.phar from here:
    **curl -sS https://getcomposer.org/installer | php**

2.- run:
    **php composer.phar install**

3.- run:
    **Vendor/bin/cake bake project <path to project>/app**

4.- edit:
    *app/webroot/index.php*, *app/webroot/test.php*

5.- in those files set this: 
```php
define( 'CAKE_CORE_INCLUDE_PATH', ROOT . DS . '/Vendor/cakephp/cakephp/lib' );
```

5.- edit:
    *app/Config/bootstrap.php*
```php
// Load Composer autoload.
require ROOT . DS . 'Vendor/autoload.php';

// Remove and re-prepend CakePHP's autoloader as Composer thinks it is the
// most important.
// See: http://goo.gl/kKVJO7
spl_autoload_unregister(array('App', 'load'));
spl_autoload_register(array('App', 'load'), true, true);
```