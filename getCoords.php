<?php
/**
 * Created by PhpStorm.
 * User: олег
 * Date: 06.11.14
 * Time: 11:19
 */
include "config". DIRECTORY_SEPARATOR ."config.php";

// Регистрируем автолоадер Composer'a
include '.'. DIRECTORY_SEPARATOR .'vendor'. DIRECTORY_SEPARATOR .'autoload.php';
if($_SERVER["REQUEST_METHOD"] == "GET") {
    $idBank = $_GET["idBank"];
    $myLatitude = $_GET["myLatitude"];
    $myLongitude = $_GET["myLongitude"];
}
$dao = new CurrencyInfoDAO();
$calc = new Calculate();
$departmentsBank = $dao->selectDepartmentsBank($idBank);
$filterDepartmentsBank = $calc->filterDistance($departmentsBank, $myLatitude, $myLongitude);
//var_dump($filterDepartmentsBank);
//var_dump($banks);
//var_dump($banks[0]["name"]);
//file_put_contents("log.txt", $banks[0]["name"]);
echo json_encode($filterDepartmentsBank);