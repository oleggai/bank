<?php
/**
 * Created by PhpStorm.
 * User: олег
 * Date: 13.10.14
 * Time: 10:02
 */

class Application {

    public static function start($currency) {

        try{
            file_put_contents("script.log", $currency. " ".date("d/m H:i")."\n", FILE_APPEND);
        }
        catch(Exception $e) {}
        $count = 0;
        do {
            $result = CURL::requestCURL($currency);
            if(is_null($result)) {
                $count++;
                if($count == 3) exit();
                sleep(60);
            }
            else {
                break;
            }
        } while($count <= 2);

        $currService = new CurrencyInfoService();
        $currService->setDao(new CurrencyInfoDAO());

        $currService->init($result);
    }
}