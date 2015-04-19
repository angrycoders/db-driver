<?php
/**
 * Created by PhpStorm.
 * User: Keysindicet
 * Date: 4/16/2015
 * Time: 1:41 PM
 */

namespace AngryCoders\Db;

use Exception;

/**
 * Class DbException
 * @package AngryCoders\Db
 */
class DbException extends Exception
{
    public function __construct($message, $code = 0, Exception $exception = null)
    {
        parent::__construct($message, $code, $exception);
    }
} 