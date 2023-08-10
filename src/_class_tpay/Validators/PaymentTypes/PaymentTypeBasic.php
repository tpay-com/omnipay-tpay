<?php

namespace Omnipay\Tpay\_class_tpay\Validators\PaymentTypes;

use Omnipay\Tpay\_class_tpay\Validators\PaymentTypesInterface;
use Omnipay\Tpay\Dictionaries\Payments\StandardFieldsDictionary;

class PaymentTypeBasic implements PaymentTypesInterface
{
    public function getRequestFields()
    {
        return StandardFieldsDictionary::REQUEST_FIELDS;
    }

    public function getResponseFields()
    {
        return StandardFieldsDictionary::RESPONSE_FIELDS;
    }
}
