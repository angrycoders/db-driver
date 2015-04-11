<?php
/**
 * Created by PhpStorm.
 * User: Keysindicet
 * Date: 4/9/2015
 * Time: 5:17 PM
 */

namespace JkuatApp\DbApi;
use JkuatApp\DbApi\Data\Table\Account;

/**
 * Main Datbase class
 * Controls access to the database class tables
 * Class DbJkuatApp
 * @package JkuatApp\DbApi
 */
class DbJkuatApp
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

    /** Database table classes **/
    /**@var Account */
    public $account;

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
        $this->$password = $password;
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
        $this->con = new \PDO("mysql:host=$this->host", $this->username, $this->password);
    }

    /**
     * Creates a new db using the name provided if it does'nt exist
     * @throws \PDOException when the query execution fails
     */
    private function createDb()
    {
        $query = "CREATE DATABASE IF NOT EXISTS " .$this->database;
        $this->con->query($query);
    }

    /**
     * initializes all table objects
     */
    private function initTables()
    {
        $this->account = new Account($this->con);
    }

    /**
     * Creates all tables in the db
     */
    private function createTables()
    {
        $this->account->create();
    }
} 