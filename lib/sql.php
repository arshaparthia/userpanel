<?php
//$db_server = "localhost";
//$db_username = "root";
//$db_password = "";
//$db_database = "registration_pdo";
//
//$conn = new PDO("mysql:host=$db_server;dbname=$db_database", $db_username, $db_password);
//$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "userpanel";
$dataBaseCreate =  $_POST['createdatabase'];
$dataBaseTable = $_POST['createtable'];
$createuser = $_POST['createuser'];
$userlist = $_POST['userlist'];

$userEmail = htmlspecialchars($_POST['email']);
$usernameLogin = $_POST['usernameLogin'];
$passwordLogin = $_POST['passwordLogin'];
$userPassword = htmlspecialchars($_POST['password']);
$userPassword = crypt($userPassword);
$url = "http://userpanel.lc/";

$reg_date = date('Y-m-d H:i:s');
// Create connection

        if (isset($dataBaseCreate)){
            try {
                $conn = new PDO("mysql:host=$servername", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "CREATE DATABASE userpanel";
                // use exec() because no results are returned
                $conn->exec($sql);
                echo "Database created successfully<br>";
            }
            catch(PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage();
            }

            $conn = null;
        }
        if (isset($dataBaseTable)) {
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "CREATE TABLE user (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(30) NOT NULL,
            password varchar(191) NOT NULL,
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";


        // use exec() because no results are returned
        $conn->exec($sql);
        echo "Database created successfully<br>";
    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
}

        if (isset($createuser)) {
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO user (email, password , reg_date)
                 VALUES ('$userEmail' , '$userPassword' , '$reg_date' )";
                // use exec() because no results are returned
                $conn->exec($sql);
                echo "New record created successfully";
                header("Location: $url");
                die();
            }
            catch(PDOException $e)
            {
                echo $sql . "<br>" . $e->getMessage();
            }

            $conn = null;
        }
                // for select db
        if (isset($userlist)) {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    // set the PDO error mode to exception
                     $data = $conn->prepare("SELECT email, password FROM user WHERE email='$usernameLogin'");
                     $data->execute();
                    $result = $data->fetchAll();
//                   var_dump($result);die;
//                    var_dump($result['0']['email']);die;


                    if (hash_equals($result['0']['password'], crypt($passwordLogin, $result['0']['password']))) {
                        echo "Password verified!";
                        setcookie("user_name", $result['0']['email'], time()+ 6000,'/'); // expires after 6000 seconds
//                        print_r($_COOKIE);
                        if (isset($_COOKIE)){
                            header("Location: " . $url . "panel");
                        }
                    }
                    else{
                        echo 'no';
                    }

                }

