<?php
if(!defined('DB_SERVER')){
    require_once("./initialize.php");
}

    $host = DB_SERVER;
    $username = DB_USERNAME;
    $password = DB_PASSWORD;
    $database = DB_NAME;
    
    $connection;

    if (!isset($connection)) {
        
        $connection = new mysqli($host, $username, $password, $database);
        
        if (!$connection) {
            echo 'Tidak dapat terhubung ke server';
            exit;
        }            
    }    

?>