<?php
/**
 * Created by PhpStorm.
 * User: Keysindicet
 * Date: 4/9/2015
 * Time: 5:17 PM
 */

namespace AngryCoders\Db;

use AngryCoders\Db\Database\iDatabase;
use AngryCoders\Db\Database\SQL\SQLDatabase;
use AngryCoders\Db\Database\the;

/**
 * Main Database class
 * Controls access to the database
 * Class Db
 * @package AngryCoders\Db
 */
class Db implements iDatabase
{
    //Database constants
    const PRIMARY_KEY = "PRIMARY KEY";
    const AUTO_INCREMENT = "AUTO_INCREMENT";
    const NOT_NULL = "NOT NULL";

    const TEXT = "TEXT";
    const INTEGER = "INTEGER";
    const VARCHAR = "VARCHAR";
    const DATETIME = "DATETIME";
    const FLOAT = "FLOAT";
    const DOUBLE = "DOUBLE";

    /**
     * @var iDatabase current db
     */
    private $db;

    public function __construct()
    {
        $this->db = new SQLDatabase();
        $this->connectToDb();
    }

    /**
     * Connects to the database
     */
    public function connectToDb()
    {
        $this->db->connectToDb();
    }

    /**
     * Creates a table with the specified name and attributes
     * @param string $tableName
     * @param array $attributes
     * @throws DbException
     */
    public function createTable($tableName, $attributes)
    {
        try {
            $this->db->createTable($tableName, $attributes);
        } catch (\Exception $e) {
            throw new DbException($e->getMessage());
        }
    }

    /**
     * Delete a table from db
     * @param string $tableName the name of the table
     * @throws DbException
     */
    public function deleteTable($tableName)
    {
        try {
            $this->db->deleteTable($tableName);
        } catch (\Exception $e) {
            throw new DbException($e->getMessage());
        }
    }

    /**
     * Inserts a new record to the db
     * @param string $tableName
     * @param array $newRecord
     * @throws DbException
     */
    public function insertRecord($tableName, $newRecord)
    {
        try {
            $this->db->insertRecord($tableName, $newRecord);
        } catch (\Exception $e) {
            throw new DbException($e->getMessage());
        }
    }

    /**
     * Deletes the specified record from the table
     * @param string $tableName name of table
     * @param string $value the value to be matched
     * @param string $field the field to check value matched
     * @throws DbException
     */
    public function deleteRecord($tableName, $value, $field)
    {
        try {
            $this->db->deleteRecord($tableName, $value, $field);
        } catch (\Exception $e) {
            throw new DbException($e->getMessage());
        }
    }

    /**
     * Return record(s) from specified table
     * @param string $tableName
     * @param string $field field to match
     * @param string $value value to match with field
     * @param array $fields columns to be returned
     * @return string executable SQL statement
     * @throws DbException
     */
    public function getRecord($tableName, $field, $value, $fields = array())
    {
        try {
            return $this->db->getRecord($tableName, $field, $value, $fields);
        } catch (\Exception $e) {
            throw new DbException($e->getMessage());
        }
    }

    /**
     * updates record(s) in db
     * @param string $tableName the name of table in db
     * @param array $fields the fields to be updated
     * @param array $values the values to update the fields
     * @param string $field the field to check
     * @param string $value the value of the field to check
     * @throws DbException
     */
    public function updateRecord($tableName, $fields, $values, $field, $value)
    {
        try {
            return $this->db->updateRecord($tableName, $fields, $values, $field, $value);
        } catch (\Exception $e) {
            throw new DbException($e->getMessage());
        }
    }

    /**
     * Get all record from db
     * @param $tableName the name of table in db
     * @param array $fields the field to be returned. Returns all fields if not specified
     * @param int $limit the number of records to return. Returns all record if not returned
     * @param int $start the record index to start record. Starts from the first record if not specified
     * @throws DbException
     * @return mixed the records from db
     */
    public function getAllRecords($tableName, $fields = array(), $limit = 0, $start = 0)
    {
        try {
            return $this->db->getAllRecords($tableName, $fields, $limit, $start);
        } catch (\Exception $e) {
            throw new DbException($e->getMessage());
        }
    }
}