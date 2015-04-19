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
}