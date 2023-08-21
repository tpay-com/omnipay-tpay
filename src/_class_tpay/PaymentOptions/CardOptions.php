<?php

namespace Omnipay\Tpay\_class_tpay\PaymentOptions;

use Omnipay\Tpay\_class_tpay\Utilities\ObjectsHelper;
use Omnipay\Tpay\_class_tpay\Utilities\TException;

class CardOptions extends ObjectsHelper
{
    public $cardsApiURL = 'https://secure.tpay.com/api/cards/';

    /** @var int */
    protected $currency = 985;

    /** @var string */
    protected $orderID = '';

    /** @var bool */
    protected $oneTimer = true;

    /** @var string */
    protected $lang = 'pl';

    /** @var bool */
    protected $enablePowUrl = false;

    /** @var string */
    protected $powUrl = '';

    /** @var string */
    protected $powUrlBlad = '';

    /** @var null|string */
    protected $cardData = null;

    /** @var string */
    protected $method = 'register_sale';

    /** @var string */
    protected $clientAuthCode = '';

    /** @var string */
    protected $amount;

    public function __construct()
    {
        $this->isNotEmptyString($this->cardApiKey, 'Card API key');
        $this->isNotEmptyString($this->cardApiPass, 'Card API password');
        $this->validateCardHashAlg($this->cardHashAlg);
        $this->validateCardCode($this->cardVerificationCode);
    }

    public function setClientToken($token)
    {
        if (!is_string($token) || 40 !== strlen($token)) {
            throw new TException('invalid token');
        }
        $this->clientAuthCode = $token;

        return $this;
    }

    public function setCurrency($currency)
    {
        $this->currency = $this->validateCardCurrency($currency);
        return $this;
    }

    /**
     * @param string $orderID
     *
     * @return $this
     */
    public function setOrderID($orderID)
    {
        $this->orderID = $orderID;
        return $this;
    }

    /**
     * @param bool $oneTimer
     *
     * @return $this
     */
    public function setOneTimer($oneTimer)
    {
        $this->oneTimer = $oneTimer;
        return $this;
    }

    /**
     * @param string $lang
     *
     * @return $this
     */
    public function setLanguage($lang)
    {
        $this->lang = $this->validateCardLanguage($lang);
        return $this;
    }

    /**
     * @param string $enablePowUrl
     *
     * @return $this
     */
    public function setEnablePowUrl($enablePowUrl)
    {
        $this->enablePowUrl = $enablePowUrl;
        return $this;
    }

    /**
     * @param string $successUrl
     * @param string $errorUrl
     *
     * @return $this
     */
    public function setReturnUrls($successUrl, $errorUrl)
    {
        $this->powUrl = $successUrl;
        $this->powUrlBlad = $errorUrl;
        return $this;
    }

    /**
     * @param string $data
     *
     * @return $this
     */
    public function setCardData($data)
    {
        $this->cardData = $data;
        return $this;
    }

    /**
     * @param string $method
     *
     * @return $this
     */
    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @param string $amount
     *
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->validateNumeric($amount);
        $this->amount = $amount;
        return $this;
    }
}
