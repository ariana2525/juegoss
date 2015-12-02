<?php

error_reporting(0);

class Model {

    private $connection;

    public function __construct() {
        global $config;

        $this->connection = mysql_pconnect($config['db_host'], $config['db_username'], $config['db_password']) or die('MySQL Error: ' . mysql_error());
        mysql_select_db($config['db_name'], $this->connection);
    }

    public function escapeString($string) {
        return mysql_real_escape_string($string);
    }

    public function escapeArray($array) {
        array_walk_recursive($array, create_function('&$v', '$v = mysql_real_escape_string($v);'));
        return $array;
    }

    public function to_bool($val) {
        return !!$val;
    }

    public function to_date($val) {
        return date('Y-m-d', $val);
    }

    public function to_time($val) {
        return date('H:i:s', $val);
    }

    public function to_datetime($val) {
        return date('Y-m-d H:i:s', $val);
    }

    public function getAll($table,$_where=false, $_select = '*') {
        $sql = "SELECT $_select FROM " . $table;
      
      if ($_where) {
           $sql .= ' WHERE ';
           $sql .= implode(" , ", array_keys($_where)) . '=';

         $sql .= implode("' , '", $_where);
      }

        $result = mysql_query($sql) or die('MySQL Error: ' . mysql_error());

        while ($row = mysql_fetch_object($result)) {
            $resultObjects[] = $row;
        }
        return $resultObjects;
    }

    public function getOne($table, $_where, $_select = '*') {
        $sql = "SELECT $_select FROM " . $table;
        $sql .= ' WHERE ';
        $sql .= implode(" , ", array_keys($_where)) . '=';

        $sql .= implode("' , '", $_where);

        $result = $result = mysql_query($sql) or die('MySQL Error: ' . mysql_error());

        return mysql_fetch_object($result);
    }

    public function Insertar($_table, $_post) {

        $sql = "INSERT INTO $_table";
        $sql .= " (`" . implode("`, `", array_keys($_post)) . "`)";
        $sql .= " VALUES ('" . implode("', '", $_post) . "') ;";


        $exec = mysql_query($sql) or die('MySQL Error: ' . mysql_error());
        return $exec;
    }

    public function Update($_table, $_post, $_where) {

        $sql = "UPDATE $_table SET ";

        foreach ($_post as $key => $val) {

            $valstr[] = sprintf(" %s = '%s' ", $key, $val);
        }

        $sql .=implode(', ', $valstr);

        $sql .= 'WHERE ';
        $sql .= implode(" , ", array_keys($_where)) . '=';

        $sql .= implode("' , '", $_where);



        $exec = mysql_query($sql);
        
        return $exec;
    }

    public function Delete($_table, $_where) {

        $sql = "DELETE FROM $_table ";

        $sql .= 'WHERE ';
        $sql .= implode(" , ", array_keys($_where)) . '=';

        $sql .= implode("' , '", $_where);
        
        $exec = mysql_query($sql) or die('MySQL Error: ' . mysql_error());
        return $exec;
    }

}

?>
