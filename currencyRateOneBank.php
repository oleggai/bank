<?php
/**
 * Created by PhpStorm.
 * User: олег
 * Date: 28.10.14
 * Time: 16:39
 */

include "config". DIRECTORY_SEPARATOR ."config.php";

// Регистрируем автолоадер Composer'a
include '.'. DIRECTORY_SEPARATOR .'vendor'. DIRECTORY_SEPARATOR .'autoload.php';

if($_SERVER["REQUEST_METHOD"] == "GET") {
    $idBank = $_GET["idBank"];
}

$dao = new CurrencyInfoDAO();
$currencyRateBank = $dao->selectCurrencyRateOneBank($idBank);
//var_dump($banks);
//var_dump($banks[0]["name"]);
//file_put_contents("log.txt", $banks[0]["name"]);
echo json_encode($currencyRateBank);