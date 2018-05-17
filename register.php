<?php
/**
 * Created by PhpStorm.
 * User: busratas
 * Date: 22.04.2018
 * Time: 22:08
 */

// mysql bilgileri
$servername = "localhost";
$username = "ingilizcepratik";
$password = "12345";
$database = "ingilizcepratik";

// mysql e bağlan
$mysql_connection = new mysqli($servername, $username, $password, $database);

if($mysql_connection->connect_error)
    die("Connection failed: " . $mysql_connection->connect_error);

// bize yollanan POST verilerini al
$user_mail = $_POST['mail'];
$user_firstname = $_POST['firstname'];
$user_lastname = $_POST['lastname'];
$user_password = $_POST['password'];
$user_password_confirm = $_POST['password_confirm'];

// eğer girilen iki şifre aynı değilse hata ver ve öl
if($user_password !== $user_password_confirm)
    die("Passwords do not match");

// girilen şifrenini MD5 hash ini al
$hashed_user_password = md5($user_password);

// yeni kullanıcı yaratan SQL komutunu hazırla
$create_new_user_sql_command = "INSERT INTO user VALUES('', '$user_mail', '$user_firstname', '$user_lastname', '$hashed_user_password')";

// kullanıcı yaratıldıysa ok bastır değilse hata ver
if($mysql_connection->query($create_new_user_sql_command) === TRUE)
    echo "ok";
else
    die("Error: " . $mysql_connection->error);

// mysql bağlantısını kapat
$mysql_connection->close();