<?php
/**
 * Created by PhpStorm.
 * User: busratas
 * Date: 16.05.2018
 * Time: 00:48
 */

session_start();

if (empty($_SESSION["session_id"]))
    die("ahmet");

$currentPassword = $_POST["currentPassword"];
$newPassword = $_POST["newPassword"];
$newPasswordConfirm = $_POST["newPasswordConfirm"];
$mail = $_SESSION["user_mail"];

function createRetvalJSON($status, $text)
{
    $arr = array();
    $arr["status"] = $status;
    $arr["text"] = $text;
    return json_encode($arr);
}

if (empty($currentPassword) || empty($newPassword) || empty($newPasswordConfirm)) {
    $status = "error";
    $text = "Şifre alanları boş olamaz. Lütfen kontrol edin.";
    die(createRetvalJSON($status, $text));
} else if ($newPassword != $newPasswordConfirm) {
    $status = "error";
    $text = "Yeni girilen şifreler aynı değil. Lütfen kontrol edin.";
    die(createRetvalJSON($status, $text));
}

$servername = "localhost";
$username = "ingilizcepratik";
$password = "12345";
$database = "ingilizcepratik";

$mysql_connection = new mysqli($servername, $username, $password, $database);

if ($mysql_connection->connect_error)
    die("Connection failed: " . $mysql_connection->connect_error);

$hashed_password = md5($currentPassword);

$read_user_sql = "SELECT * FROM user WHERE mail = '$mail' AND password = '$hashed_password'";

$result = $mysql_connection->query($read_user_sql);

$row = $result->fetch_array(MYSQLI_ASSOC);
if (empty($row)) {
    $status = "error";
    $text = "Girilen şifre hatalı. Lütfen kontrol ediniz.";
    echo createRetvalJSON($status, $text);
} else {
    $hashed_new_password = md5($newPassword);
    $change_password_sql = "UPDATE user SET password = '$hashed_new_password' WHERE mail = '$mail'";
    $query = $mysql_connection->query($change_password_sql);
    if ($query) {
        $status = "ok";
        $text = "Şifre değişimi başarılı.";
        echo createRetvalJSON($status, $text);
    } else {
        $status = "error";
        $text = "MySQL Error: " . $mysql_connection->error;
        echo createRetvalJSON($status, $text);
    }
}

$mysql_connection->close();