<?php
/**
 * Created by PhpStorm.
 * User: Keysindicet
 * Date: 4/9/2015
 * Time: 4:35 PM
 */

namespace JkuatApp\DbApi\Data\Table;

use JkuatApp\DbApi\Data\Table;

/**
 * The class for the accounts table
 * Class Account
 * @package JkuatApp\DbApi\Data\Table
 */
class Account extends Table
{

    const TABLE_NAME = "account";

    /**
     * table columns
     */
    const COL_ACCOUNT_ID = "accountID";
    const COL_USERNAME = "username";
    const COL_PASSWORD = "password";

    /**
     * Constructor
     * @param string $tableName
     */
    public function __construct()
    {
        parent::__construct(self::TABLE_NAME);
    }

    /**
     * create schema in the db
     */
    public function create()
    {
        $sql = "CREATE TABLE IF NOT EXISTS " .self::TABLE_NAME."( "
                    .self::COL_ACCOUNT_ID." INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,"
                    .self::COL_USERNAME. " VARCHAR(100) NOT NULL,"
                    .self::COL_PASSWORD. " VARCHAR(255) NOT NULL)
                    ENGINE=InnoDB";
    }
}