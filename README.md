# NiceHalf Framework "Still under development"

NiceHalf Framework is an open source PHP Framework ready for production

## Installation

Use [Composer](https://getcomposer.org) to install NiceHalf Framework.

```bash
composer create-project nicehalf/nicehalf-framework
```

## Usage of Application :

```php
# get composer autoload
require __DIR__ . '/../vendor/autoload.php';

# get application class
require __DIR__ . '/../system/Application.php';

# run the app
Application::run();
```

## Usage of Cookie

```php
# get cookie class
require __DIR__ . '/../system/Cookies/Cookie.php';

#or use

# import cookie class
use NicehalfCore\System\Cookies\Cookie;

# set cookie , you can set expire time by edit the third parameter 
Cookie::set('name', 'value');

# Check that cookie has the key
if (Cookie::has('name')) {
    echo 'has cookie';
}

# Get cookie by the given key
echo Cookie::get('name');

# Delete cookie by the given key
Cookie::delete('name');

# Return all cookies
print_r(Cookie::all());

# Destroy all cookies
Cookie::destroy();
```




## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)
