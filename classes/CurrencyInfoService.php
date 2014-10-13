<?php
/**
 * Created by PhpStorm.
 * User: олег
 * Date: 10.10.14
 * Time: 15:19
 */

class CurrencyInfoService implements Service {

    /**
     * @var CurrencyInfoDAOInterface
     */
    public $dao;

    /**
     * @param \CurrencyInfoDAOInterface $dao
     */
    public function setDao(CurrencyInfoDAOInterface $dao)
    {
        $this->dao = $dao;
    }


    public function init($result) {
        $parser = new Parser();
        $banksInfo = $parser->parseJson($result);
        $this->dao->saveAll($banksInfo);
    }


}