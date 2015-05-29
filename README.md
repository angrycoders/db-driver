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

###Adding a new table

**tbName** - Name of the table

**fields** - Fields and attributes of the table

*format*

 $fields = array(
 
 field1 => array(field1type, field1Size, extra field1 attribs, ... , ...),
 
 field2 => array(field2type, field2Size, extra field1 attribs, ... , ...))


**Note** - For each field the field Type and field Size must be the first attributes to be specified respectively. The other fields can
follow in any order. If a field does not have a size just specify zero (0).

```php

try {

    $db->createTable("student", array(
            "studentID" => array(Db::INTEGER, 11, Db::PRIMARY_KEY, Db::AUTO_INCREMENT),
            "regNo" => array(Db::VARCHAR, 20),
            "accountID" => array(Db::INTEGER, 11),
            "name" => array(Db::VARCHAR, 50)));

} catch (DbException $e) {
    echo $e;
}

```

###Deleting a table

```php

$db->deleteTable("tableName");

```

###Inserting a record

```php

$db -> insertRecord("student", array(NULL, 'cs281-3722/2013', '54', '23', 'Magani Felix'));

```

###Deleting a record

Deletes a Record from **student** table where **regNo** = **cs281-3722/2013**

```php

$db -> deleteRecord("student", 'cs281-3722/2013', "regNo");

```

###Getting record(s)

```php

//selecting all columns to be returned where 'name' field contains 'Felix'
$result = $db->getRecord("student", 'name', 'Felix');

foreach($result as $row)
{
    echo $row['studentID'] . "<br>";
    echo $row['regNo'] . "<br>";
    echo $row['courseID'] . "<br>";
    echo $row['name'] . "<br>";
    echo $row['accountID'] . "<br><br>";
}

//selecting accountID and name fields only to be returned
$result = $db->getRecord("student", 'name', 'Felix', array('name','accountID'));
foreach($result as $row)
{
    echo $row['name'] . "<br>";
    echo $row['accountID'] . "<br>";
}

```

###Updating record(s)

```php

$tableName = "student"; //The name of the table
$fields = array('name', 'accountID'); //Fields to be updated
$values = array('John Doe', '23'); //The new values
$field = 'regNo'; //The field to check
$value = 'cs281'; // The value of the field to check

$db->updateRecord($tableName, $fields, $values, $field, $value);

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
