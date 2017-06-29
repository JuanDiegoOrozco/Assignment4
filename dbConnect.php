<?php

// database functions ************************************************
function fConnectToDatabase() {
    //$host = "127.0.0.1";
    try {
        $db = new PDO('mysql:host=localhost; port=3306; dbname=test', 'root', '');

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        return $db;
    }
    catch (PDOException $e){
        echo($e->getMessage());
    }
}
?>
