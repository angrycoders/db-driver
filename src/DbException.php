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
    const CREATE_TABLE_SYNTAX = 0;

    public function __construct($code, Exception $exception = null)
    {
        switch($this->code)
        {
            case self::CREATE_TABLE_SYNTAX:
                $message = "There was an error in your create table params";
                break;
        }
        parent::__construct($message, $code, $exception);
    }

} 