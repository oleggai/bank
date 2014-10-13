<?php
/**
 * Created by PhpStorm.
 * User: олег
 * Date: 10.10.14
 * Time: 15:15
 */

class CURL {
    public static function requestCURL($currency) {
        $urlConst = "http://kurs.com.ua/ajax/valyuta_nalichnie/all/".$currency."/";
        $todayDate = date("d.m.Y");
        $url = $urlConst.$todayDate."/0";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt_array($ch, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => True,
            ));
        $result = curl_exec($ch);
        $result = json_decode($result);
        //var_dump($result);
        curl_close($ch);
        return $result;
    }

}