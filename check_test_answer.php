<?php
/**
 * Created by PhpStorm.
 * User: busratas
 * Date: 17.05.2018
 * Time: 00:47
 */

session_start(); // oturumu başlat

if (empty($_SESSION["session_id"])) // eğer önceden oturum yoksa öl
    die();

// bize yollanan POST verilerini al
$current_test = $_POST["test_id"];
$question = $_POST["question"];
$user_answer = $_POST["answer"];
// oturumdan kullanıcı id sini al
$user_id = $_SESSION["user_id"];

$test_path = "";

// şuanki test bilgisine göre ilgili test verilerini içeren dosyayı belirle
switch ($current_test) {
    case 1:
        $test_path = "./data/test1.json";
        break;
    case 2:
        $test_path = "./data/test2.json";
        break;
    case 3:
        $test_path = "./data/test3.json";
        break;
    default:
        die("Wrong test request!");
}

// dosyanın tamamını oku
$test_file = file_get_contents($test_path);
// okunan verileri JSON dan bir array'e dönüştür
$test_array = json_decode($test_file, true);

if ($test_array["questions"][$question]["correct_answer"] == $user_answer) { // eğer girilen cevap doğruysa mysql e bağlan ve adamın son başarılı yaptığı soruyu güncelle
    $servername = "localhost";
    $username = "ingilizcepratik";
    $password = "12345";
    $database = "ingilizcepratik";

    $mysql_connection = new mysqli($servername, $username, $password, $database);

    if ($mysql_connection->connect_error)
        die("Connection failed: " . $mysql_connection->connect_error);

    if ($question++ == 0) { // adamın ilk soru cevaplaması olduğu için tabloda güncellenecek veri yok, o yüzden bu seferlik tabloya bir veri girişi yap
        $sql = "INSERT INTO test VALUES('$current_test', '$user_id', 1)";
    } else { // tablodaki veriyi güncelleyen SQL
        $sql = "UPDATE test SET last_answered_question = '$question' WHERE user_id = '$user_id' AND test_id = '$current_test'";
    }

    $mysql_connection->query($sql);

    echo "ok";
} else
    echo "wrong answer";

$mysql_connection->close();