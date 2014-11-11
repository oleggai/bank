<?php
/**
 * Created by PhpStorm.
 * User: олег
 * Date: 20.10.14
 * Time: 9:11
 */
set_time_limit(900);

include "config". DIRECTORY_SEPARATOR ."config.php";

// Регистрируем автолоадер Composer'a
include '.'. DIRECTORY_SEPARATOR .'vendor'. DIRECTORY_SEPARATOR .'autoload.php';

$dao = new CurrencyInfoDAO();
$dao->moveHourlyCurrencyInfo();