<?php
require_once(__DIR__ . "/config/db_config.php");

try {
    $conn = new PDO("mysql:host=" . $DB_CONFIG['hostname'] . ";dbname=" . $DB_CONFIG['db_name'] . "", $DB_CONFIG["username"], $DB_CONFIG["password"], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_EMULATE_PREPARES => false));
}
catch(PDOException $e) {
    $e->getMessage();
}