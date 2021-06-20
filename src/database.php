<?php 

class Database {

    private static function getConnection() {
        //set up for using PDO
        $user = 'root';
        $pass = 'root';
        $host = 'localhost';
        $db_name = 'ID309638_project2';
        //set up DSN
        $dsn = "mysql:host=$host;dbname=$db_name";
        $db = new PDO($dsn, $user, $pass);
        return $db
    }
}
?>