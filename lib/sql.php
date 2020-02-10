<?php
//$db_server = "localhost";
//$db_username = "root";
//$db_password = "";
//$db_database = "registration_pdo";
//
//$conn = new PDO("mysql:host=$db_server;dbname=$db_database", $db_username, $db_password);
//$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




// test connect

//try{
//    $dbh = new pdo( 'mysql:host=0.0.0.0:3306;dbname=test',
//        'root',
//        'root',
//        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
//    die(json_encode(array('outcome' => true)));
//}
//catch(PDOException $ex){
//    die(json_encode(array('outcome' => false, 'message' => 'Unable to connect')));
//}


//main
if (isset($_POST['submit'])){
    $db_server = "0.0.0.0:3306";
    $db_username = "root";
    $db_password = "root";
    $db_database = "test";

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $user_name = $_POST['user_name'];
    $password1 = $_POST['password'];
    $createUser = $_POST['create'];

    $conn = new PDO("mysql:host=$db_server;dbname=$db_database", $db_username, $db_password);
//var_dump($conn);die;
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO user (first_name, last_name, user_name, password)
VALUES ('$first_name', '$last_name', '$user_name', '$password1')";
//var_dump($sql);die;
    $sql_create = "CREATE TABLE `user_registration` (
  `user_id` INT(11) NOT NULL,
  `first_name` VARCHAR(100) NOT NULL,
  `last_name` VARCHAR(100) NOT NULL,
  `user_name` VARCHAR(100) NOT NULL,
  `password` VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";



    /** @var TYPE_NAME $createUser */
    if (isset($createUser)){
        $conn->exec($sql_create);
    }
    else {
        $conn->exec($sql);
    }

    echo "<script>alert('Account successfully added!'); window.location='index.php'</script>";

}
