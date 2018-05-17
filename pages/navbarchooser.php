<?php
/**
 * Created by PhpStorm.
 * User: busratas
 * Date: 16.05.2018
 * Time: 00:29
 */

function isActive($navitem)
{
    $currentPage = $_GET["page"];
    $activeNavitem = "";

    switch ($currentPage) {
        case "profile":
            $activeNavitem = "profile";
            break;
        case "test":
        case "practice_test":
            $activeNavitem = "practice_test";
            break;
        default:
            $activeNavitem = "home";
            break;
    }

    if ($navitem === $activeNavitem)
        return "active";
    else
        return "";
}