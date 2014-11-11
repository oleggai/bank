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
            $sql = "INSERT INTO hourly_currency_info (currency, bank, nameBank, ask, ask_change, bid, bid_change, updated, datetime)
                    VALUES (:currency, :bank, :nameBank, :ask, :ask_change, :bid, :bid_change, :updated, :datetime)";
            $query = $this->db->prepare($sql);

            foreach($banksInfo as $key => $bank) {
                $date = DateTime::createFromFormat('d.m H:i', $bank->getUpdated());
                $query->execute(array(
                        ":currency"   => $bank->getCurrency(),
                        ":bank"       => $bank->getBank(),
                        ":nameBank"   => $bank->getNameBank(),
                        ":ask"        => $bank->getAsk(),
                        ":ask_change" => $bank->getAskChange(),
                        ":bid"        => $bank->getBid(),
                        ":bid_change" => $bank->getBidChange(),
                        ":updated"    => $date->format('Y-m-d H:i:s'),
                        ":datetime"   => $bank->getDatetime()
                    ));
            }
        }
        catch(Exception $e) {
            echo $e->getMessage();
        }
    }

    public function moveHourlyCurrencyInfo() {
        try {
            $idCurrencies = $this->selectHourlyIdCurrency();
            foreach($idCurrencies as $key => $idCurrency){
                $sql = "SELECT id, currency, bank, nameBank, ask, ask_change, bid, bid_change, updated, datetime
                        FROM hourly_currency_info
                        WHERE datetime = (SELECT MAX(datetime) FROM hourly_currency_info WHERE currency = :currency)";
                $query = $this->db->prepare($sql);
                $query->execute(array(
                        ":currency" => $idCurrency[0]
                    ));
                $query->setFetchMode(PDO::FETCH_ASSOC);
                $this->insertIntoDailyCurrInfo($query->fetchAll());
            }
        }
        catch(Exception $e) {
            echo $e->getMessage();
        }
    }

    private function selectHourlyIdCurrency() {
        try {
            $sql = "SELECT DISTINCT currency FROM hourly_currency_info";
            $query = $this->db->query($sql);
            $query->setFetchMode(PDO::FETCH_NUM);
            //var_dump($query->fetchAll());
            return $query->fetchAll();
        }
        catch(Exception $e) {
            echo $e->getMessage();
        }
    }

    private function insertIntoDailyCurrInfo(array $data) {
        //var_dump($data);
        try {
            foreach($data as $key => $bank) {
            $sql = "INSERT INTO daily_currency_info (id, currency, bank, nameBank, ask, ask_change, bid, bid_change, updated, datetime)
                    VALUES (:id, :currency, :bank, :nameBank, :ask, :ask_change, :bid, :bid_change, :updated, :datetime)";
            $query = $this->db->prepare($sql);
            $query->execute(array(
                    ":id"         => $bank["id"],
                    ":currency"   => $bank["currency"],
                    ":bank"       => $bank["bank"],
                    ":nameBank"   => $bank["nameBank"],
                    ":ask"        => $bank["ask"],
                    ":ask_change" => $bank["ask_change"],
                    ":bid"        => $bank["bid"],
                    ":bid_change" => $bank["bid_change"],
                    ":updated"    => $bank["updated"],
                    ":datetime"   => $bank["datetime"]
                ));

            }
        }
        catch(Exception $e) {
            echo $e->getMessage();
        }
    }

    public function selectDailyInfo($currency) {
        try {
            $sql = "SELECT * FROM daily_currency_info WHERE currency = :currency";
            $query = $this->db->prepare($sql);
            $query->execute(array(
                    ":currency"   => $currency
                ));
            $query->setFetchMode(PDO::FETCH_ASSOC);
            return $query->fetchAll();

        }
        catch(Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getBanks() {
        try {
            $sql = "SELECT * FROM bank";
            $query = $this->db->query($sql);
            $query->setFetchMode(PDO::FETCH_ASSOC);
            return $query->fetchAll();
        }
        catch(Exception $e) {
            echo $e->getMessage();
        }
    }

    public function selectCurrencyRateOneBank($idBank) {
        try {
            $sql = "SELECT * FROM daily_currency_info WHERE bank = :bank";
            $query = $this->db->prepare($sql);
            $query->execute(array(
                    ":bank"   => $idBank
                ));
            $query->setFetchMode(PDO::FETCH_ASSOC);
            return $query->fetchAll();

        }
        catch(Exception $e) {
            echo $e->getMessage();
        }
    }

    public function selectDepartmentsBank($idBank) {
        try{
            $sql = "SELECT * FROM department_bank WHERE idBank = :idBank";
            $query = $this->db->prepare($sql);
            $query->execute(array(
                    ":idBank"   => $idBank
                ));
            $query->setFetchMode(PDO::FETCH_ASSOC);
            return $query->fetchAll();
        }
        catch(Exception $e) {
            echo $e->getMessage();
        }

    }
}