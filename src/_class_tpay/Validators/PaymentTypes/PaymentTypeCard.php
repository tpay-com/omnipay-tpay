<?php

namespace Omnipay\Tpay\_class_tpay\Validators\PaymentTypes;

use Omnipay\Tpay\_class_tpay\Validators\PaymentTypesInterface;
use Omnipay\Tpay\Dictionaries\Payments\CardFieldsDictionary;

class PaymentTypeCard implements PaymentTypesInterface
{
    public function getRequestFields()
    {
        return CardFieldsDictionary::REQUEST_FIELDS;
    }

    public function getResponseFields()
    {
        return CardFieldsDictionary::RESPONSE_FIELDS;
    }
}
