#jkuatapp/dbapi

JKUAT App database interface

## Install

Via Composer

```
$ composer require angrycoders/db
```

Get master branch update

```
require "angrycoders/db": "dev-master"
```

Get for a specific version

```
require "angrycoders/db": "1.0.0"
```

## Usage
Make sure your server is running first.

```php

require_once '../vendor/autoload.php';

use AngryCoders\Db\Db;

use AngryCoders\Db\DbException;

$db = new Db();

```

## Testing

``` bash
$ phpunit
```

## Contributing

Please see CONTRIBUTING.md for details.

## Security

If you discover any security related issues, please email keysindicet@gmail.com instead of using the issue tracker.

## Credits

Magani Felix


## License

The MIT License (MIT). Please see LICENSE.md for more information.
