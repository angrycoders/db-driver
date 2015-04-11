<?php

/**
 * Created by PhpStorm.
 * User: Keysindicet
 * Date: 4/9/2015
 * Time: 3:35 PM
 */

namespace JkuatApp\DbApi\Data;

/**
 * Class Table
 * abstract class to be inherited by all tables
 * @package JkuatApp\DbApi\Data
 */
abstract class Table
{

    /**
     * @var \PDO connection to the db
     */
    protected $con;

    /**
     * The name of the table in the db
     * @var string
     */
    protected $tableName;

    /**
     * The Constructor
     * @param string $tableName The name of the table in the database
     */
    public function __construct($tableName, $con)
    {
        $this->$tableName = $tableName;
        $this->con = $con;
    }

    /**
     * create table in db
     */
    public abstract function create();
}