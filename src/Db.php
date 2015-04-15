<?php
/**
 * Created by PhpStorm.
 * User: Keysindicet
 * Date: 4/9/2015
 * Time: 5:17 PM
 */

namespace AngryCoders\Db;
use \PDO;

/**
 * Main Database class
 * Controls access to the database class tables
 * Class Db
 * @package AngryCoders\Db
 */
class Db
{

    /**
     * @var \PDO connection to the db
     */
    private $con;

    /**
     * Database details
     */
    private $host;
    private $username;
    private $password;
    private $database;

    /**
     * Constructor
     * @param string $host name of host
     * @param string $username name of user
     * @param string $password password for the user
     * @param string $database name of database
     * @throws \PDOException when the connection to db fails
     */
    public function __construct($host, $username, $password, $database)
    {
        $this->host = $host;
        $this->$username = $username;

        $this->database = $database;
        $this->connectToDb();
        $this->createDb();
        $this->initTables();
        $this->createTables();
    }

    /**
     * Connect to the db
     * @throws \PDOException when the connection to db fails
     */
    private function connectToDb()
    {
        $this->con = new PDO("mysql:host=$this->host", $this->username, $this->password);
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

} 