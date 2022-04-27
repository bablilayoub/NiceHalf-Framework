# NiceHalf Framework "Still under development"

NiceHalf Framework is an open source PHP Framework ready for production

## Installation

Use [Composer](https://getcomposer.org) to install NiceHalf Framework.

```bash
composer create-project nicehalf/nicehalf-framework
```

## Usage of Application :

```php
# Get composer autoload
require __DIR__ . '/../vendor/autoload.php';

# Get application class
require __DIR__ . '/../system/Applications/Application.php';

# Run the app
Application::run();
```

## Usage of Cookie :

```php
# Get cookie class
require __DIR__ . '/../system/Cookies/Cookie.php';

# Or use import cookie class
use NicehalfCore\System\Cookies\Cookie;

# Set cookie , you can set expire time by edit the third parameter 
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

## Usage of Session :

```php
# Get session class
require __DIR__ . '/../system/Sessions/Session.php';

# Or use import session class
use NicehalfCore\System\Sessions\Session;

# Start session
Session::start();

# Set session
Session::set('name', 'value');

# Check that session has the key
if (Session::has('name')) {
    echo 'has session';
}

# Get session by the given key
echo Session::get('name');

# Delete session by the given key
Session::delete('name');

# Return all sessions
print_r(Session::all());

# Get flash session by the given key
Session::flash('name');

# Destroy all sessions
Session::destroy();
```

## Usage of Database :

```php
# Get database class
require __DIR__ . '/../system/Database/Database.php';

# Or use import database class
use NicehalfCore\System\Database\Database;

# Connect to database
#Database connection start only when you call a method and you can use the following methods :

# Select
Database::table('table_name')->select('column_name');

# Insert
Database::table('table_name')->insert(['column_name' => 'value'])->execute();

# Update
Database::table('table_name')->update(['column_name' => 'value'])->where('column_name', '=', 'value');

# Delete
Database::table('table_name')->delete()->where('column_name', '=', 'value');

# To join table
Database::table('table_name')->join('table_name', 'table_name.column_name', '=', 'table_name.column_name');

# To join table on left
Database::table('table_name')->leftJoin('table_name', 'table_name.column_name', '=', 'table_name.column_name');

# To join table on right
Database::table('table_name')->rightJoin('table_name', 'table_name.column_name', '=', 'table_name.column_name');

# Usage of where
Database::table('table_name')->where('column_name', '=', 'value');

# Usage of orWhere 
Database::table('table_name')->orWhere('column_name', '=', 'value');

# Filter string : filtring inputs is automatically handled by the framework

# Usage of groupBy
Database::table('table_name')->groupBy('column_name');

# Usage of orderBy
Database::table('table_name')->orderBy('column_name', 'asc');

# Usage of limit
Database::table('table_name')->limit(10);

# Usage of offset
Database::table('table_name')->offset(10);

# Usage of having
Database::table('table_name')->having('column_name', '=', 'value');

# Usage of get
print_r(Database::table('table_name')->get());

# Get first row
print_r(Database::table('table_name')->first());

# Usage of count
print_r(Database::table('table_name')->count());

# Usage of patination
print_r(Database::table('table_name')->paginate(10));

# Get links for pagination
print_r(Database::table('table_name')->links()); // use it in view

# Usage of clear
Database::table('table_name')->clear(); // automatically handled by the framework
```

## Usage of Exception :

```php
# Get exception class
require __DIR__ . '/../system/Exeptions/Whoops.php';

# Or use import exception class
use NicehalfCore\System\Exeptions\Whoops;

# Throw exception
throw new Exception('message');
```

# Usage of File :

```php
# Get file class
require __DIR__ . '/../system/Extra/File.php';

# Or use import file class
use NicehalfCore\System\Extra\File;

# Get Root path
echo File::root();

# Get directory separator
echo File::ds();

# Get file full path
echo File::path('path/to/file');

# Check if file exists
echo File::exist('path/to/file');

# Require file
File::require_file('path/to/file');

# Include file
File::include_file('path/to/file');

# Require directory
File::require_directory('path/to/dir');
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## Version
1.0.0

## Author
Developed by Ayoub Bablil.

## Email
ayoubbablil@gmail.com

## Website
https://nicehalf.com - Under development

## License
The framework is open-sourced software licensed under the [MIT](https://choosealicense.com/licenses/mit/) license.