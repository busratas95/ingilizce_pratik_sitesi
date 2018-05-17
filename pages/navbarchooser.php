<?php
/**
 * Created by PhpStorm.
 * User: busratas
 * Date: 16.05.2018
 * Time: 00:29
 */

// bu kod navbarda hangi item ın active olması gerektiğini ayarlıyor
// çalıştığında ya active yazıyor ya da hiç bir şey yazmıyor
// böylece ilgili CSS sınıfı o item için yüklenmiş oluyor
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