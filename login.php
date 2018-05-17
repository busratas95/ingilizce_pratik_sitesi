<?php
/**
 * Created by PhpStorm.
 * User: busratas
 * Date: 05.05.2018
 * Time: 23:10
 */

$servername = "localhost";
$username = "ingilizcepratik";
$password = "12345";
$database = "ingilizcepratik";

$mysql_connection = new mysqli($servername, $username, $password, $database);

if($mysql_connection->connect_error)
    die("Connection failed: " . $mysql_connection->connect_error);

$user_mail = $_POST['login_mail'];
$user_password = $_POST['login_password'];

$hashed_password = md5($user_password);

$read_user_sql = "SELECT * FROM user WHERE mail = '$user_mail' AND password = '$hashed_password'";

$result = $mysql_connection->query($read_user_sql);

$row = $result->fetch_array(MYSQLI_ASSOC);
if (isset($row))
    echo "ok";
else
    die("User not found");

session_start();

$_SESSION["session_id"] = time();
$_SESSION["user_firstname"] = $row["firstname"];
$_SESSION["user_lastname"] = $row["lastname"];
$_SESSION["user_mail"] = $row["mail"];
$_SESSION["user_id"] = $row["id"];

$mysql_connection->close();
