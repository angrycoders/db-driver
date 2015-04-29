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
            foreach ($attribs as $i => $attrib) {
                if ($i == 1)
                    $query .= ($attrib == "0" ? "" : "($attrib)");
                else
                    $query .= " $attrib";
            }
            if ($index != ($size - 1))
                $query .= " ,";
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
        foreach ($newRecord as $index => $record) {
            $query .= " '$record'";
            if ($index != ($size - 1))
                $query .= " ,";
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

    /**
     * Encodes get record statement
     * @param string $tableName
     * @param string $field field to match
     * @param string $value value to match with field
     * @param array $fields columns to be returned
     * @return string executable SQL statement
     */
    public static function encodeGetRecord($tableName, $field, $value, $fields = array())
    {
        $select = "";
        $size = sizeof($fields);
        //Select fields to be returned
        if (sizeof($fields) > 0) {
            foreach ($fields as $i => $column) {
                $select .= " $column";
                if ($i != ($size - 1))
                    $select .= ",";
            }
        } else {
            $select = "*";
        }

        $query = "SELECT $select FROM $tableName WHERE $field = '$value';";
        return $query;
    }

    /**
     * Encodes the params to an SQL statement
     * @param string $tableName the name of table in db
     * @param array $fields the fields to be updated
     * @param array $values the values to update the fields
     * @param string $field the field to check
     * @param string $value the value of the field to check
     * @return string executable SQL statement
     */
    public static function encodeUpdateRecord($tableName, $fields, $values, $field, $value)
    {
        $query = "UPDATE $tableName SET";
        $size = sizeof($fields);
        foreach ($fields as $i => $column) {
            $query .= " $column = '$values[$i]'";
            if ($i != ($size - 1))
                $query .= ",";
        }
        $query .= " WHERE $field = '$value';";
        return $query;
    }
} 