<?php
/**
 * Created by PhpStorm.
 * User: busratas
 * Date: 17.05.2018
 * Time: 00:47
 */

session_start();

if (empty($_SESSION["session_id"]))
    die();

$current_test = $_POST["test_id"];
$question = $_POST["question"];
$user_answer = $_POST["answer"];
$user_id = $_SESSION["user_id"];

$test_path = "";

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

$test_file = file_get_contents($test_path);

$test_array = json_decode($test_file, true);

if ($test_array["questions"][$question]["correct_answer"] == $user_answer) {
    $servername = "localhost";
    $username = "ingilizcepratik";
    $password = "12345";
    $database = "ingilizcepratik";

    $mysql_connection = new mysqli($servername, $username, $password, $database);

    if ($mysql_connection->connect_error)
        die("Connection failed: " . $mysql_connection->connect_error);

    if ($question++ == 0) {
        $sql = "INSERT INTO test VALUES('$current_test', '$user_id', 1)";
    } else {
        $sql = "UPDATE test SET last_answered_question = '$question' WHERE user_id = '$user_id' AND test_id = '$current_test'";
    }

    $mysql_connection->query($sql);

    echo "ok";
} else
    echo "wrong answer";