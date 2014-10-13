<?php
/**
 * Created by PhpStorm.
 * User: олег
 * Date: 09.10.14
 * Time: 17:05
 */
class CurrencyInfoDAO implements CurrencyInfoDAOInterface {
    public $db = null;
    public function __construct() {
        $this->db = Connection::getConnection();
    }
    public function saveOne() {}
    public function saveAll($banksInfo) {
        try{
            $updated = date("Y-m-d H:i:s");
            $sql = "INSERT INTO currency_info (currency, bank, ask, ask_change, bid, bid_change, updated)
                    VALUES (:currency, :bank, :ask, :ask_change, :bid, :bid_change, :updated)";
            $query = $this->db->prepare($sql);

            foreach($banksInfo as $key => $bank) {
                $query->execute(array(
                        ":currency"   => $bank->getCurrency(),
                        ":bank"       => $bank->getBank(),
                        ":ask"        => $bank->getAsk(),
                        ":ask_change" => $bank->getAskChange(),
                        ":bid"        => $bank->getBid(),
                        ":bid_change" => $bank->getBidChange(),
                        ":updated"    => $updated
                    ));
            }
        }
        catch(Exception $e) {
            echo $e->getMessage();
        }
    }
}