<?php
/**
 * Created by PhpStorm.
 * User: олег
 * Date: 10.10.14
 * Time: 15:24
 */

interface CurrencyInfoDAOInterface {
    public function saveOne();
    public function saveAll($banksInfo);
}