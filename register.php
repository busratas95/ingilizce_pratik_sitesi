<?php
/**
 * Created by PhpStorm.
 * User: busratas
 * Date: 22.04.2018
 * Time: 22:08
 */

$servername = "localhost";
$username = "ingilizcepratik";
$password = "12345";
$database = "ingilizcepratik";

$mysql_connection = new mysqli($servername, $username, $password, $database);

if($mysql_connection->connect_error)
    die("Connection failed: " . $mysql_connection->connect_error);

$user_mail = $_POST['mail'];
$user_firstname = $_POST['firstname'];
$user_lastname = $_POST['lastname'];
$user_password = $_POST['password'];
$user_password_confirm = $_POST['password_confirm'];

if($user_password !== $user_password_confirm)
    die("Passwords do not match");

$hashed_user_password = md5($user_password);

$create_new_user_sql_command = "INSERT INTO user VALUES('', '$user_mail', '$user_firstname', '$user_lastname', '$hashed_user_password')";

if($mysql_connection->query($create_new_user_sql_command) === TRUE)
    echo "User created successfully";
else
    die("Error: " . $mysql_connection->error);

$mysql_connection->close();