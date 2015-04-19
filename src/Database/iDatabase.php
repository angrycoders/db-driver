<?php
/**
 * Created by PhpStorm.
 * User: Keysindicet
 * Date: 4/15/2015
 * Time: 6:53 PM
 */

namespace AngryCoders\Db\Database;

/**
 * Interface iDatabase
 * interface to be implemented by all databases
 * @package AngryCoders\Db
 */
interface iDatabase {

    /**
     * Connects to the database
     */
    public function connectToDb();

    /**
     * Creates a table with the specified name and attributes
     * @param string $tableName
     * @param array $fields
     */
    public function createTable($tableName, $fields);

    /**
     * Delete a table from db
     * @param string $tableName the name of the table
     */
    public function deleteTable($tableName);

    /**
     * Inserts a new record to the db
     * @param string $tableName
     * @param array $newRecord     *
     */
    public function insertRecord($tableName, $newRecord);

    /**
     * Deletes the specified record from the table
     * @param string $tableName name of table
     * @param string $value the value to be matched
     * @param string $field the field to check value matched
     */
    public function deleteRecord($tableName, $value, $field);
} 