<?php
/**
 * Created by PhpStorm.
 * User: олег
 * Date: 10.10.14
 * Time: 10:53
 */

class Parser {
    public $currencyInfo = null;
    public $banksInfo    = array();

    public function parseJson($result) {

/*        echo "currency_id: ".$result->values->new[0]->currency_id."<br>";
        echo "organization_id: ".$result->values->new[0]->organization_id."<br>";
        echo "ask: ".$result->values->new[0]->ask."<br>";
        echo "ask_change: ".$result->values->new[0]->ask_change."<br>";
        echo "bid: ".$result->values->new[0]->bid."<br>";
        echo "bid_change: ".$result->values->new[0]->bid_change."<br>";*/

        foreach($result->values->new as $key => $value) {
            $this->currencyInfo = new HourlyCurrencyInfo();
            $this->currencyInfo->setCurrency($value->currency_id);
            $this->currencyInfo->setBank($value->organization_id);
            $this->currencyInfo->setNameBank($value->accusative);
            $this->currencyInfo->setAsk($value->ask);
            $this->currencyInfo->setAskChange($value->ask_change);
            $this->currencyInfo->setBid($value->bid);
            $this->currencyInfo->setBidChange($value->bid_change);
            $this->currencyInfo->setUpdated($value->date." ".$value->enter_date);
            $this->currencyInfo->setDatetime(date("Y-m-d H:i"));
            $this->banksInfo[] = $this->currencyInfo;
        }
        return $this->banksInfo;
    }
}