<?php
/**
 * Created by PhpStorm.
 * User: олег
 * Date: 22.10.14
 * Time: 12:30
 */
include "config". DIRECTORY_SEPARATOR ."config.php";

// Регистрируем автолоадер Composer'a
include '.'. DIRECTORY_SEPARATOR .'vendor'. DIRECTORY_SEPARATOR .'autoload.php';

$dao = new CurrencyInfoDAO();
$banks = $dao->getBanks();
//var_dump($banks);
//var_dump($banks[0]["name"]);
//file_put_contents("log.txt", $banks[0]["name"]);
echo json_encode($banks);