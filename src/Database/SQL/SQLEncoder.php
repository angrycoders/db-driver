<?php
/**
 * Created by PhpStorm.
 * User: Keysindicet
 * Date: 4/16/2015
 * Time: 11:44 AM
 */

namespace AngryCoders\Db\Database\SQL;

/**
 * Class SQLEncoder
 * Transforms arrays and string to sql statements
 * @package AngryCoders\Db\Database\SQL
 */
class SQLEncoder
{

    /**
     * Creates a create table sql statement
     * @param $tableName
     * @param $fields
     * @return string executable sql statement
     */
    public static function encodeCreateTable($tableName, $fields)
    {
            $query = "CREATE TABLE IF NOT EXISTS $tableName (";
            $keys = array_keys($fields);
            $size = sizeof($keys);

            foreach ($keys as $index => $field) {
                $query .= " $field";
                $attribs = $fields[$field];
                foreach($attribs as $i => $attrib) {
                    if($i == 1)
                        $query .= ($attrib == "0"? "" : "($attrib)");
                    else
                        $query .= " $attrib";
                }
                if($index != ($size - 1))
                    $query .=" ,";
            }

            $query .= ") ENGINE=InnoDB DEFAULT CHARSET=latin1;";
            return $query;
    }
} 