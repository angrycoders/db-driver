
# angrycoders/db-driver

Database driver for [angrycoders/system](https://github.com/angrycoders/system) and ecosystem.


## Install

Via Composer

```bash
$ composer require angrycoders/db
```

Get master branch update

```bash
$ composer require "angrycoders/db": "dev-master"
```

Get for a specific version

```bash
$ composer require "angrycoders/db": "1.0.0"
```


## Usage

Make sure your server is running first.

```php
require_once __DIR__ . '../vendor/autoload.php';

use AngryCoders\Db\Db;

use AngryCoders\Db\DbException;

$db = new Db();
```


### Adding a new table

```php
$db->createTable(tableName, fields)
```

Creates a new table in the database, if it does **not** exist already.

* `tableName` (string): name of the table
* `fields` (array): associative array describe the table's attributes. See [below](#attrs).

<a name="attrs"></a>

`fields` passed to `createTable`:

```php
 $fields = array(
    fieldName1 => array(type, size [, extraAttrb1, extraAttrb2, ... , ...]),
    fieldName2 => array(type, size [, extraAttrib1, extraAttrb2, ... , ...]),
    ...)
```

* `fieldName` (string): name of the attribute
* `type` (constant): **Required.** Constant exposed by the library. Include:
    * `Db::DATETIME`
    * `Db::DOUBLE`
    * `Db::FLOAT`
    * `Db::INTEGER`
    * `Db::TEXT`
    * `Db::VARCHAR`
* `size` (integer): **Required.** Length of field. If a field does not have a size just specify zero (`0`).
* `extraAttrb1, extraAttrb2, ...`: **Optional.** Any other attributes to be applied. For example,
    * `Db::AUTO_INCREMENT`
    * `Db::NOT_NULL`
    * `Db::PRIMARY_KEY`

Example:

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


### Deleting a table

```php
$db->deleteTable(tableName);
```

Removes a table from the database.

* `tableName` (string): table name

Example:

```php
$db->deleteTable("tableName");
```


### Inserting a record

```php
$db->insertRecord(tableName, values)
```
Inserts a record into the target table.

* `tableName` (string): table name
* `values` (array): array of values to be inserted.

Example:

```php
$db -> insertRecord("student", array(NULL, 'cs281-3722/2013', '54', '23', 'Magani Felix'));
```


### Deleting a record

```php
$db->deleteRecord(tableName, value, field)
```

Deletes a record from table `tableName` where `field` equals `value`.

* `tableName` (string): name of table
* `value` (Any): value to be compared with
* `field` (string): name of field to be used to search for `value`

Example:

```php
$db->deleteRecord("student", 'cs281-3722/2013', "regNo");
```


### Selecting records

```php
$db->getRecord(tableName, field, value [, targetFields])
```

Selects all records from table `tableName` where field `field` contains `value`.

* `tableName` (string): table name
* `field` (string): name of field to used to search for `value`
* `value` (Any): value to be compared with
* `targetFields` (array): **Optional**. Array of field names to return values from. If not passed, all the fields will be used.

Example:

```php
$result = $db->getRecord("student", 'name', 'Felix');

foreach($result as $row)
{
    echo $row['studentID'] . "<br>";
    echo $row['regNo'] . "<br>";
    echo $row['courseID'] . "<br>";
    echo $row['name'] . "<br>";
    echo $row['accountID'] . "<br><br>";
}

$result = $db->getRecord("student", 'name', 'Felix', array('name','accountID'));
foreach($result as $row)
{
    echo $row['name'] . "<br>";
    echo $row['accountID'] . "<br>";
}
```


### Getting records

```php
$db->getAllRecords(tableName [, targetFields [, numOfRecords [, startIndex]]])
```

Return all records in table `tableName`.

* `tableName` (string): table name
* `targetFields` (array): **Optional**. Array of field names to return values from. If not passed, all the fields will be used
* `numOfRecords` (integer): **Optional**. number of records to return
* `startIndex` (integer): **Optional**. From which index to fetch records from

Example:

```php
$result = $db->getAllRecords("student");

foreach($result as $row)
{
    echo $row['studentID'] . "<br>";
    echo $row['regNo'] . "<br>";
    echo $row['courseID'] . "<br>";
    echo $row['name'] . "<br>";
    echo $row['accountID'] . "<br><br>";
}

//selecting accountID and name fields only to be returned
$result = $db->getAllRecords("student", array('name','accountID'));

//selecting the first 5 records to be returned
$result = $db->getAllRecords("student", null, 5);

//selecting the next 10 records to be returned from the 5th record
$result = $db->getAllRecords("student", null, 10, 4);
```


### Updating records

```php
$db->updateRecord(tableName, fields, values, discriminantField, discriminantValue)
```

Update records in table `tableName` in the fields `fields` with the values `values` where the field `discriminantField` equals `discriminantValue`.

* `tableName` (string): table name
* `fields` (array): array of table fields to target
* `values` (array): array of values to update with
* `discriminantField` (string): name of field to use to compare records with
* `discriminantValue` (Any): value used to compare against

Example:

```php
$tableName = "student"; //The name of the table
$fields = array('name', 'accountID'); //Fields to be updated
$values = array('John Doe', '23'); //The new values
$field = 'regNo'; //The field to check
$value = 'cs281'; // The value of the field to check

$db->updateRecord($tableName, $fields, $values, $field, $value);
```


## Testing

```bash
$ phpunit
```

## Contributing

Please see [CONTRIBUTING.md](https://github.com/angrycoders/db-driver/blob/master/CONTRIBUTING.md) for details.


## Security

If you discover any security related issues, please email keysindicet@gmail.com instead of using the issue tracker.


## Credits

[Magani Felix](https://github.com/keysindicet) and [Contributors](https://github.com/angrycoders/jkuatapp-dbapi/graphs/contributors).


## License

**The MIT License (MIT)**. Please see [LICENSE.md](https://github.com/angrycoders/db-driver/blob/master/LICENSE.md) for more information.

