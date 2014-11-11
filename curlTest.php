<?php
/**
 * Created by PhpStorm.
 * User: олег
 * Date: 21.10.14
 * Time: 14:38
 */
$ch = curl_init("localhost/bank/test.php");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch);
curl_close($ch);
var_dump(json_decode($result));