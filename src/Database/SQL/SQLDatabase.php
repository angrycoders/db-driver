<?php
/**
 * Created by PhpStorm.
 * User: Keysindicet
 * Date: 4/15/2015
 * Time: 6:59 PM
 */

namespace AngryCoders\Db\Database\SQL;

use AngryCoders\Db\Database\iDatabase;
use PDO;

/**
 * Class SQLDatabase
 * SQL Database implementation
 * @package AngryCoders\Db
 */
class SQLDatabase implements iDatabase
{

    /**
     * @var \PDO connection to the db
     */
    private $con;

    /**
     * Database details
     */
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbName = "jkuatapp";

    /**
     * Connect to the db
     * @throws \PDOException when the connection to db fails
     */
    public function connectToDb()
    {
        $this->con = new PDO("mysql:host=$this->host", $this->username, $this->password);
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->con->query("CREATE DATABASE IF NOT EXISTS " . $this->dbName);
        $this->con->query("USE " . $this->dbName);
    }

    /**
     * Creates a table with the specified name and attributes
     * @param string $tableName
     * @param array $fields
     * @throws \PDOException
     */
    public function createTable($tableName, $fields)
    {
        $query = SQLEncoder::encodeCreateTable($tableName, $fields);
        $this->con->query($query);
    }

    /**
     * Delete a table from db
     * @param string $tableName the name of the table
     */
    public function deleteTable($tableName)
    {
        $query = "DROP TABLE IF EXISTS " . $tableName;
        $this->con->query($query);
    }

    /**
     * Inserts a new record to the db
     * @param string $tableName
     * @param array $newRecord *
     */
    public function insertRecord($tableName, $newRecord)
    {
        $query = SQLEncoder::encodeInsertRecord($tableName, $newRecord);
        $this->con->query($query);
    }

    /**
     * Deletes the specified record from the table
     * @param string $tableName name of table
     * @param string $value the value to be matched
     * @param string $field the field to check value matched
     */
    public function deleteRecord($tableName, $value, $field)
    {
        $query = SQLEncoder::encodeDeleteRecord($tableName, $value, $field);
        $this->con->query($query);
    }
}