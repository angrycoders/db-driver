<?php

/**
 * Created by PhpStorm.
 * User: Keysindicet
 * Date: 4/29/2015
 * Time: 6:09 PM
 */

use AngryCoders\Db\Database\SQL\SQLEncoder;
use AngryCoders\Db\Db;

/**
 * Class SQLEncoderTest
 * class to test the SQLEncoder class
 */
class SQLEncoderTest extends PHPUnit_Framework_TestCase{

    /**
     * test the encodeCreateTable function
     */
    public function testEncodeCreateTable()
    {
        $query = SQLEncoder::encodeCreateTable("student", array(
            "studentID" => array(Db::INTEGER, 11, Db::PRIMARY_KEY, Db::AUTO_INCREMENT),
            "regNo" => array(Db::VARCHAR, 20),
            "accountID" => array(Db::INTEGER, 11),
            "name" => array(Db::VARCHAR, 50)));

        $expected = "CREATE TABLE IF NOT EXISTS student ( studentID INTEGER(11) PRIMARY KEY AUTO_INCREMENT , regNo VARCHAR(20) , accountID INTEGER(11) , name VARCHAR(50)) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
        $this->assertEquals($expected, $query);
    }

    /**
     * test the encodeInsertRecord function
     */
    public function testEncodeInsertRecord()
    {
        $query = SQLEncoder::encodeInsertRecord("student", array(NULL, 'cs281-3722/2013', '54', '23', 'Magani Felix'));
        $expected = "INSERT INTO student VALUES ( '' , 'cs281-3722/2013' , '54' , '23' , 'Magani Felix' );";
        $this->assertEquals($expected, $query);
    }

    /**
     * test the encodeDeleteRecord function
     */
    public function testEncodeDeleteRecord()
    {
        $query = SQLEncoder::encodeDeleteRecord('student', 'Felix', 'name');
        $expected = "DELETE FROM student WHERE name = 'Felix';";
        $this->assertEquals($expected, $query);
    }

    /**
     * test the encodeGetRecord function
     */
    public function testEncodeGetRecord()
    {
        $query = SQLEncoder::encodeGetRecord("student", 'name', 'felix');
        $expected = "SELECT * FROM student WHERE name = 'felix';";
        $this->assertEquals($expected, $query);

        $query = SQLEncoder::encodeGetRecord("student", 'name', 'Felix', array('name','accountID'));
        $expected = "SELECT  name, accountID FROM student WHERE name = 'Felix';";
        $this->assertEquals($expected, $query);
    }

    /**
     * test the encodeUpdateRecord function
     */
    public function testEncodeUpdateRecord()
    {
        $tableName = "student"; //The name of the table
        $fields = array('name', 'accountID'); //Fields to be updated
        $values = array('John Doe', '23'); //The new values
        $field = 'regNo'; //The field to check
        $value = 'cs281'; // The value of the field to check

        $query = SQLEncoder::encodeUpdateRecord($tableName, $fields, $values, $field, $value);
        $expected = "UPDATE student SET name = 'John Doe', accountID = '23' WHERE regNo = 'cs281';";
        $this->assertEquals($expected, $query);
    }


} 