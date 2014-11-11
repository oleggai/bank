<?php
/**
 * Created by PhpStorm.
 * User: олег
 * Date: 15.10.14
 * Time: 12:00
 */
if($_SERVER["REQUEST_METHOD"] == "GET") {
    $currency = $_GET["curr"];
    include_once(".." . DIRECTORY_SEPARATOR . "init.php");
    Application::start($currency);
}
