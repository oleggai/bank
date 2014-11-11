<?php
/**
 * Created by PhpStorm.
 * User: олег
 * Date: 09.10.14
 * Time: 12:31
 */
$ch = curl_init("http://www.matrix-soft.org/bank/currencies/run.php?curr=rub");
curl_exec($ch);
curl_close($ch);