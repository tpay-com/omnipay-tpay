<?php

namespace Omnipay\Tpay\_class_tpay\Validators\PaymentTypes;

use Omnipay\Tpay\_class_tpay\Validators\PaymentTypesInterface;
use Omnipay\Tpay\Dictionaries\FieldsConfigDictionary;
use Omnipay\Tpay\Dictionaries\Payments\BlikFieldsDictionary;

class PaymentTypeBlikAlias implements PaymentTypesInterface
{
    public function getRequestFields()
    {
        $fields = BlikFieldsDictionary::REQUEST_FIELDS;
        $fields['code'][FieldsConfigDictionary::REQUIRED] = false;

        return $fields;
    }

    public function getResponseFields()
    {
        return BlikFieldsDictionary::ALIAS_RESPONSE_FIELDS;
    }
}
