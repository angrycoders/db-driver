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


    /**
     * Creates a insert record SQL statement
     * @param $tableName
     * @param $newRecord
     * @return string executable sql statement
     */
    public static function encodeInsertRecord($tableName, $newRecord)
    {
        $query = "INSERT INTO $tableName VALUES (";
        $size = sizeof($newRecord);
        foreach($newRecord as $index => $record){
            $query .= " '$record'";
            if($index != ($size - 1))
                $query .=" ,";
        }
        $query .= " );";
        return $query;
    }

    /**
     * Creates a delete record SQL statement
     * @param $tableName
     * @param $value
     * @param $field
     * @return string executable SQL statement
     */
    public static function encodeDeleteRecord($tableName, $value, $field)
    {
        $query = "DELETE FROM $tableName WHERE $field = '$value';";
        return $query;
    }
} 