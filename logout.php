<?php
/**
 * Created by PhpStorm.
 * User: busratas
 * Date: 6.05.2018
 * Time: 01:01
 */

session_start(); // oturumu aç

session_unset(); // oturumda tutulan tüm verileri sil (olsa da olmasa da)

session_destroy(); // oturumu tamamen yok et

echo "ok";