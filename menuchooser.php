<?php
/**
 * Created by PhpStorm.
 * User: busratas
 * Date: 7.05.2018
 * Time: 22:37
 */

// menüdeki her satır ya a etiketi olabilir ya da div
// eğer a ise o sayfa aktif değildir ve kullanıcı ona basarak o sayfaya gidebilir
// eğer div ise o sayfa aktiftir ve kullanıcı ona bassa da bir şey olmaz aynı sayfaya kalır

// a etikleri burada tanımlanır
$tenses_link = "<a href=\"?page=tenses\" class=\"list-group-item list-group-item-action\">Zamanlar (Tenses)</a>";
$grammer_link = "<a href=\"?page=grammer\" class=\"list-group-item list-group-item-action\">Dil Bilgisi (Grammer)</a>";
$dict_link = "<a href=\"?page=dict\" class=\"list-group-item list-group-item-action\">Sözlük (Dictionary)</a>";
$daily_usages_link = "<a href=\"?page=daily_usages\" class=\"list-group-item list-group-item-action\">Günlük İngilizce<br/>(Daily Usages)</a>";
$verbs_link = "<a href=\"?page=verbs\" class=\"list-group-item list-group-item-action\">İngilizce Fiiller (Verbs)</a>";

// div etiketleri burada tanımlanır
$tenses_div = "<div class=\"list-group-item list-group-item-action active\">Zamanlar (Tenses)</div>";
$grammer_div = "<div class=\"list-group-item list-group-item-action active\">Dil Bilgisi (Words)</div>";
$dict_div = "<div class=\"list-group-item list-group-item-action active\">Sözlük (Dictionary)</div>";
$daily_usages_div = "<div class=\"list-group-item list-group-item-action active\">Günlük İngilizce<br/>(Daily Usages)</div>";
$verbs_div = "<div class=\"list-group-item list-group-item-action active\">İngilizce Fiiller (Verbs)</div>";

// GET içindeki page parametresini al
// yani tarayıcıda adres satırında görünen ?page= parametresini al
$page = $_GET["page"];

if (empty($_GET["page"])) { // eğer parametre boşsa ya da yoksa, kullanıcı ana sayfada ve ilk satır seçili olsun
    echo $tenses_div
        . $grammer_link
        . $dict_link
        . $daily_usages_link
        . $verbs_link;
} else { // eğer parametre boş değilse, kullanıcı hangi sayfadaysa şuan o sayfayının menü satırını deaktif ederek bir menü oluştur ve oluşan menüyü sayfaya bas
    switch ($page) {
        case "home":
        case "tenses":
            echo $tenses_div
                . $grammer_link
                . $dict_link
                . $daily_usages_link
                . $verbs_link;
            break;
        case "grammer":
            echo $tenses_link
                . $grammer_div
                . $dict_link
                . $daily_usages_link
                . $verbs_link;
            break;
        case "dict":
            echo $tenses_link
                . $grammer_link
                . $dict_div
                . $daily_usages_link
                . $verbs_link;
            break;
        case "daily_usages":
            echo $tenses_link
                . $grammer_link
                . $dict_link
                . $daily_usages_div
                . $verbs_link;
            break;
        case "verbs":
            echo $tenses_link
                . $grammer_link
                . $dict_link
                . $daily_usages_link
                . $verbs_div;
            break;
        default:
            echo $tenses_link
                . $grammer_link
                . $dict_link
                . $daily_usages_link
                . $verbs_link;
    }
}