<?php
/**
 * Created by PhpStorm.
 * User: Keysindicet
 * Date: 4/15/2015
 * Time: 6:59 PM
 */

namespace AngryCoders\Db;

/**
 * Class SQLDatabase
 * SQL Database implementation
 * @package AngryCoders\Db
 */
class SQLDatabase implements iDatabase{

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
        $this->con->query("CREATE TABLE IF NOT EXISTS". $this->dbName);
    }

    /**
     * Creates a table with the specified name and attributes
     * @param string $tableName
     * @param array $attributes
     */
    public function createTable($tableName, $attributes)
    {
        // TODO: Implement createTable() method.
    }
}