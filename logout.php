<?php
/**
 * Created by PhpStorm.
 * User: busratas
 * Date: 6.05.2018
 * Time: 01:01
 */

session_start();

session_unset();

session_destroy();

echo "ok";