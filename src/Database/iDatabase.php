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

    /**
     * Return record(s) from specified table
     * @param string $tableName
     * @param string $field field to match
     * @param string $value value to match with field
     * @param array $fields columns to be returned
     * @return string executable SQL statement
     */
    public function getRecord($tableName, $field, $value, $fields = array());

    /**
     * updates record(s) in db
     * @param string $tableName the name of table in db
     * @param array $fields the fields to be updated
     * @param array $values the values to update the fields
     * @param string $field the field to check
     * @param string $value the value of the field to check
     */
    public function updateRecord($tableName, $fields, $values, $field, $value);


} 