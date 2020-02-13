<?php
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "userpanel";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password,[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //Set PDO to fire PDOExceptions on errors.
        PDO::ATTR_EMULATE_PREPARES => false //Disable emulated prepares. Solves some minor edge cases.
    ]);
    // set the PDO error mode to exception
    //No need for incrementer. The index of the comment should be enough.
    //No need for incrementer. The index of the comment should be enough.
    $data = $conn->prepare("SELECT email, password , id FROM user");
    $data->execute();
    $result = $data->fetchAll();
    $newPassword = substr(md5(time()), 0, 16) . "hi";
    $newPassword = crypt($newPassword);
//    $conn->lastInsertId();
    foreach ($result as $data) {
//        var_dump($data['email']);
//        var_dump($data['id']);
//        var_dump($data);die;
        $idUser = $data['id'];
        $newPassword = substr(md5(time()), 0, 16) . "hi";
        $newPassword = crypt($newPassword);
        $sql = "UPDATE user SET password='$newPassword' WHERE id=$idUser";
        // use exec() because no results are returned
        $conn->exec($sql);
//        send Email
        mail($data['email'],"your new password",$newPassword);
    }
//    var_dump($result);
    die;

} catch (PDOException $e) {
    echo "Some sort of error has occurred! Here are the details! ";
    echo $e->getMessage();
}