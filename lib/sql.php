<?php
//$db_server = "localhost";
//$db_username = "root";
//$db_password = "";
//$db_database = "registration_pdo";
//
//$conn = new PDO("mysql:host=$db_server;dbname=$db_database", $db_username, $db_password);
//$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




// test connect

try{
    $dbh = new pdo( 'mysql:host=0.0.0.0:3306;dbname=test',
        'root',
        'root',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    die(json_encode(array('outcome' => true)));
}
catch(PDOException $ex){
    die(json_encode(array('outcome' => false, 'message' => 'Unable to connect')));
}