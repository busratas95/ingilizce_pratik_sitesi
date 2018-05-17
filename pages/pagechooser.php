<?php
/**
 * Created by PhpStorm.
 * User: busratas
 * Date: 7.05.2018
 * Time: 21:55
 */

// bu kod anlık GET page parametresine göre hangi sayfanın yüklenmesi gerektiğini ayarlar

$page = $_GET["page"];

if (empty($_GET["page"])) {
    include_once "tenses.php";
} else {

    switch ($page) {
        case "home":
        case "tenses":
            include_once "tenses.php";
            break;
        case "grammer":
            include_once "grammer.php";
            break;
        case "dict":
            include_once "search.php";
            break;
        case "daily_usages":
            include_once "daily_usages.php";
            break;
        case "verbs":
            include_once "verbs.php";
            break;
        case "profile":
            include_once "profile.php";
            break;
        case "practice_test":
            include_once "practice_test.php";
            break;
        case "test":
            include_once "test.php";
            break;
        default:
            include_once "notfound.php";
    }

}