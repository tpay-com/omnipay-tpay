<?php

namespace Omnipay\Tpay\_class_tpay\Validators\PaymentTypes;

use Omnipay\Tpay\_class_tpay\Validators\PaymentTypesInterface;
use Omnipay\Tpay\Dictionaries\Payments\WhiteLabelFieldsDictionary;

class PaymentTypeWhiteLabel implements PaymentTypesInterface
{
    public function getRequestFields()
    {
        return WhiteLabelFieldsDictionary::REQUEST_FIELDS;
    }

    public function getResponseFields() {}
}
