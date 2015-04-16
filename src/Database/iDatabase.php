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
} 