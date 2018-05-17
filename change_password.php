<?php
/**
 * Created by PhpStorm.
 * User: busratas
 * Date: 16.05.2018
 * Time: 00:48
 */

session_start(); // bir oturum aç

if (empty($_SESSION["session_id"])) // eğer önceden açılmış bir oturum yoksa
    die("ahmet"); // sayfayı öldür

// bize POST edilen verileri yakala
$currentPassword = $_POST["currentPassword"];
$newPassword = $_POST["newPassword"];
$newPasswordConfirm = $_POST["newPasswordConfirm"];
// oturum bilgisinden kullanıcının mailini çek
$mail = $_SESSION["user_mail"];

// geriye dönecek JSON formatındaki veriyi hazırlayan fonksiyon
function createRetvalJSON($status, $text)
{
    $arr = array();
    $arr["status"] = $status;
    $arr["text"] = $text;
    return json_encode($arr); // üstteki array in iki elemanını JSON formatında birleştir
}

if (empty($currentPassword) || empty($newPassword) || empty($newPasswordConfirm)) { // eğer girilen şifrelerden birisi boşsa hata ver
    $status = "error";
    $text = "Şifre alanları boş olamaz. Lütfen kontrol edin.";
    die(createRetvalJSON($status, $text));
} else if ($newPassword != $newPasswordConfirm) { // eğer girilen yeni şifreler birbiriyle aynı değilse hata ver
    $status = "error";
    $text = "Yeni girilen şifreler aynı değil. Lütfen kontrol edin.";
    die(createRetvalJSON($status, $text));
}

// mysql bağlantı bilgileri:
$servername = "localhost";
$username = "ingilizcepratik";
$password = "12345";
$database = "ingilizcepratik";

// mysql bağlantısı aç
$mysql_connection = new mysqli($servername, $username, $password, $database);

// bağlantı açılmadıysa sayfayı öldür
if ($mysql_connection->connect_error)
    die("Connection failed: " . $mysql_connection->connect_error);

// şimdiki şifrenin MD5 hash ini al
$hashed_password = md5($currentPassword);

// user çeken SQL sorgusu
$read_user_sql = "SELECT * FROM user WHERE mail = '$mail' AND password = '$hashed_password'";

// SQL sorgusunu çalıştır
$result = $mysql_connection->query($read_user_sql);

// gelen sonucu ASSOCIATIVE array olarak al
$row = $result->fetch_array(MYSQLI_ASSOC);
if (empty($row)) { // eğer sonuç gelmediyse kullanıcı yanlış şifre girmiştir
    $status = "error";
    $text = "Girilen şifre hatalı. Lütfen kontrol ediniz.";
    echo createRetvalJSON($status, $text);
} else { // sonuç geldiyse yeni şifreyi SQL ' de UPDATE et
    $hashed_new_password = md5($newPassword);
    $change_password_sql = "UPDATE user SET password = '$hashed_new_password' WHERE mail = '$mail'";
    $query = $mysql_connection->query($change_password_sql);
    if ($query) {
        // her şey başarılıysa olumlu mesaj döndür
        $status = "ok";
        $text = "Şifre değişimi başarılı.";
        echo createRetvalJSON($status, $text);
    } else {
        // mysql hata verdiyse hata ver
        $status = "error";
        $text = "MySQL Error: " . $mysql_connection->error;
        echo createRetvalJSON($status, $text);
    }
}

// mysql bağlantısını kapat
$mysql_connection->close();