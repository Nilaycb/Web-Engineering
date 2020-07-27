<?php
require_once(__DIR__ . "/../config/db_config.php");
require_once(__DIR__ . "/../db_connection.php");


function create_db($db_name=null) {
    global $conn, $DB_CONFIG;

    //return
    $res = null;

    if ($db_name == null) {
        $db_name = $DB_CONFIG["db_name"];
    }

    try {
        //override the default $conn for creating database
        $conn = new PDO('mysql:$DB_CONFIG["hostname"]', $DB_CONFIG["username"], $DB_CONFIG["password"], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_EMULATE_PREPARES => false));
        $res = $conn->exec("CREATE DATABASE IF NOT EXISTS $db_name");
    }
    catch(PDOException $e) {
        $e->getMessage();
    }

    $conn = null;

    return $res;
}


function create_table() {
    global $conn;

    //return
    $res = null;

    try {
        $sql = "CREATE TABLE IF NOT EXISTS student (
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            firstname varchar(50) NOT NULL,
            lastname varchar(50) NOT NULL
        )";

        $conn->exec($sql);
        $res = TRUE;
    }
    catch(PDOException $e) {
        $e->getMessage();
    }

    $conn = null;

    return $res;
}

