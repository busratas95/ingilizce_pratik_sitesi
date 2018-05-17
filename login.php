<?php
/**
 * Created by PhpStorm.
 * User: busratas
 * Date: 05.05.2018
 * Time: 23:10
 */

// mysql bilgileri
$servername = "localhost";
$username = "ingilizcepratik";
$password = "12345";
$database = "ingilizcepratik";

// mysql bağlantısı kur
$mysql_connection = new mysqli($servername, $username, $password, $database);

if($mysql_connection->connect_error)
    die("Connection failed: " . $mysql_connection->connect_error);

// bize yollanan POST verilerini al
$user_mail = $_POST['login_mail'];
$user_password = $_POST['login_password'];

// gelen şifrenin MD5 hash ini al
$hashed_password = md5($user_password);

// kullanıcı okuyan SQL sorgusunu hazırla
$read_user_sql = "SELECT * FROM user WHERE mail = '$user_mail' AND password = '$hashed_password'";
// kullanıcıyı oku
$result = $mysql_connection->query($read_user_sql);
// gelen veriyi bir array'e koy
$row = $result->fetch_array(MYSQLI_ASSOC);
if (isset($row)) // eğer veri geldiyse kullanıcı doğru giriş yapmıştır
    echo "ok";
else // veri gelmediyse kullanıcı yanlış bilgi girdi ya da kullanıcı yok, hata ver ve öl
    die("User not found");

// oturum aç
session_start();
// oturuma mysql den gelen verileri ekle böylece diğer sayfalarda kullanılabilsinler sürekli mysql e sormak yerine
$_SESSION["session_id"] = time();
$_SESSION["user_firstname"] = $row["firstname"];
$_SESSION["user_lastname"] = $row["lastname"];
$_SESSION["user_mail"] = $row["mail"];
$_SESSION["user_id"] = $row["id"];
// mysql bağlantısını kapat
$mysql_connection->close();
