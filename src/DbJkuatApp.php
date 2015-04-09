<?php
/**
 * Created by PhpStorm.
 * User: Keysindicet
 * Date: 4/9/2015
 * Time: 5:17 PM
 */

namespace JkuatApp\DbApi;

/**
 * Main Datbase class
 * Controls access to the database class tables
 * Class DbJkuatApp
 * @package JkuatApp\DbApi
 */
class DbJkuatApp {

    /**
     * @var \PDO connection to the db
     */
    private $con;

    /**
     * Database constants
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
     */
    public function __construct($host, $username, $password, $database)
    {
        $this->host = $host;
        $this->$username = $username;
        $this->$password = $password;
        $this->database = $database;
        $this->connectToDb();
    }

    /**
     * Connect to the db
     */
    private function connectToDb()
    {
        try {
            $this->con = new \PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
        }
        catch(\PDOException $e){
            echo $e->getMessage();
        }
    }
} 