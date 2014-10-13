<?php
/**
 * Created by PhpStorm.
 * User: олег
 * Date: 09.10.14
 * Time: 16:58
 */

class CurrencyInfo {

    private $id        = null;
    private $currency  = null;
    private $bank      = null;
    private $ask       = null;
    private $askChange = null;
    private $bid       = null;
    private $bidChange = null;
    private $updated   = null;

    public function __construct() {}

    /**
     * @param null $ask
     */
    public function setAsk($ask)
    {
        $this->ask = $ask;
    }

    /**
     * @return null
     */
    public function getAsk()
    {
        return $this->ask;
    }

    /**
     * @param null $askChange
     */
    public function setAskChange($askChange)
    {
        $this->askChange = $askChange;
    }

    /**
     * @return null
     */
    public function getAskChange()
    {
        return $this->askChange;
    }

    /**
     * @param null $bank
     */
    public function setBank($bank)
    {
        $this->bank = $bank;
    }

    /**
     * @return null
     */
    public function getBank()
    {
        return $this->bank;
    }

    /**
     * @param null $bid
     */
    public function setBid($bid)
    {
        $this->bid = $bid;
    }

    /**
     * @return null
     */
    public function getBid()
    {
        return $this->bid;
    }

    /**
     * @param null $bidChange
     */
    public function setBidChange($bidChange)
    {
        $this->bidChange = $bidChange;
    }

    /**
     * @return null
     */
    public function getBidChange()
    {
        return $this->bidChange;
    }

    /**
     * @param null $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return null
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param null $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    /**
     * @return null
     */
    public function getUpdated()
    {
        return $this->updated;
    }
}